<?php

namespace Dhruvang\GenerateRules\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RelationsGeneratorController extends Controller
{
    public function generate(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'data' => ['required', 'array']
        ]);
        $relationData = $validatedData['data'];


        $relationMethod = match ($relationData['relation']) {
            'BelongsTo' => $this->generateBelongsToRelation($relationData),
            'BelongsToMany' => $this->generateBelongsToManyRelation($relationData),
            'HasOne' => $this->generateHasOneRelation($relationData),
            'HasMany' => $this->generateHasManyRelation($relationData),
            'HasOneThrough' => $this->generateHasOneThroughRelation($relationData),
            'HasManyThrough' => $this->generateHasManyThroughRelation($relationData),
            'MorphOne' => $this->generateMorphOneRelation($relationData),
            'MorphMany' => $this->generateMorphManyRelation($relationData),
            default => 'Unknown relation type',
        };

        return response()->json([
            'status' => 'success',
            'relationMethod' => $relationMethod
        ]);
    }

    protected function generateBelongsToRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel);

        return <<<PHP
        Inside $fromModel.php
        /**
         * Get the related $toModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return \$this->belongsTo($toModel::class);
        }
        PHP;
    }

    protected function generateBelongsToManyRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel) . 's'; // plural for many-to-many

        return <<<PHP
        Inside $fromModel.php
        /**
         * The $toModel that belong to the $fromModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return \$this->belongsToMany($toModel::class);
        }
        PHP;
    }

    protected function generateHasOneRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel);

        return <<<PHP
        Inside $fromModel.php
        /**
         * Get the $toModel associated with the $fromModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\HasOne
        {
            return \$this->hasOne($toModel::class);
        }
        PHP;
    }

    protected function generateHasManyRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel) . 's'; // plural for one-to-many

        return <<<PHP
        Inside $fromModel.php
        /**
         * Get the $toModel for the $fromModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return \$this->hasMany($toModel::class);
        }
        PHP;
    }

    protected function generateHasOneThroughRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $throughModel = Str::ucfirst($relationData['through']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel);

        return <<<PHP
        Inside $fromModel.php
        /**
         * Get the $toModel that is owned through $throughModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
        {
            return \$this->hasOneThrough($toModel::class, $throughModel::class);
        }
        PHP;
    }

    protected function generateHasManyThroughRelation(array $relationData): string
    {
        $fromModel = Str::ucfirst($relationData['from']);
        $throughModel = Str::ucfirst($relationData['through']);
        $toModel = Str::ucfirst($relationData['to']);
        $methodName = strtolower($toModel) . 's'; // plural for many

        return <<<PHP
        Inside $fromModel.php
        /**
         * Get the $toModel that are owned through $throughModel.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
        {
            return \$this->hasManyThrough($toModel::class, $throughModel::class);
        }
        PHP;
    }

    protected function generateMorphOneRelation(array $relationData): string
    {
        $morphChildModel = Str::ucfirst($relationData['morphChild']);
        $morphChildModelMethod = strtolower($relationData['morphChild']);
        $methodName = strtolower($morphChildModel) . 'able';

        $output = <<<PHP
        // Inside $morphChildModel.php
        /**
         * Get the parent $methodName model.
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\MorphTo
        {
            return \$this->morphTo();
        }


        PHP;
        foreach ($relationData['morphParent'] as $morphParent) {
            if ($morphParent) {
                $morphParentModel = Str::ucfirst($morphParent);
                $morphParentMethod = strtolower($morphParent);

                $output .= <<<PHP
                // Inside $morphParentModel.php
                /**
                 * Get the $morphParentModel's $morphChildModelMethod.
                 */
                public function $morphChildModelMethod(): \Illuminate\Database\Eloquent\Relations\MorphOne
                {
                    return \$this->morphOne($morphChildModel::class, '$methodName');
                }


                PHP;
            }
        }

        return $output;
    }

    protected function generateMorphManyRelation(array $relationData): string
    {
        $morphChildModel = Str::ucfirst($relationData['morphChild']);
        $morphChildModelMethod = strtolower($relationData['morphChild']);
        $methodName = strtolower($morphChildModel) . 'able';
        $methodNameWithS = strtolower($morphChildModelMethod) . 's';

        $output = <<<PHP
        // Inside $morphChildModel.php
        /**
         * Get the parent $methodName model.
         */
        public function $methodName(): \Illuminate\Database\Eloquent\Relations\MorphTo
        {
            return \$this->morphTo();
        }


        PHP;
        foreach ($relationData['morphParent'] as $morphParent) {
            if ($morphParent) {
                $morphParentModel = Str::ucfirst($morphParent);
                $morphParentMethod = strtolower($morphParent);

                $output .= <<<PHP
                // Inside $morphParentModel.php
                /**
                 * Get the $morphParentModel's $methodNameWithS.
                 */
                public function $methodNameWithS(): \Illuminate\Database\Eloquent\Relations\MorphMany
                {
                   return \$this->morphMany($morphChildModel::class, '$methodName');
                }


                PHP;
            }
        }

        return $output;
    }
}
