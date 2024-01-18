<script>
import CommonCommands from "./common-commands";
import CacheCommands from "./cache-commands";
import ConfigCommands from "./config-commands";
import AuthCommands from "./auth-commands";
import ChannelCommands from "./channel-commands";
import DbCommands from "./db-commands";
import EnvCommands from "./env-commands";
import EventCommands from "./event-commands";
import KeyCommands from "./key-commands";
import LangCommands from "./lang-commands";
import ViewCommands from "./view-commands";
import VendorCommands from "./vendor-commands";
import StubCommands from "./stub-commands";
import StorageCommands from "./storage-commands";
import SessionCommands from "./session-commands";
import SchemaCommands from "./schema-commands";
import ScheduleCommands from "./schedule-commands";
import SanctumCommands from "./sanctum-commands";
import SailCommands from "./sail-commands";
import RouteCommands from "./route-commands";
import QueueCommands from "./queue-commands";
import PackageCommands from "./package-commands";
import OptimizeCommands from "./optimize-commands";
import NotificationsCommands from "./notifications-commands";
import ModelCommands from "./model-commands";
import MigrateCommands from "./migrate-commands";
import MakeCommands from "./make-commands";

export default {
    components: {
        StorageCommands,
        CacheCommands,
        ConfigCommands,
        AuthCommands,
        ChannelCommands,
        DbCommands,
        EnvCommands,
        EventCommands,
        KeyCommands,
        LangCommands,
        ViewCommands,
        VendorCommands,
        StubCommands,
        SessionCommands,
        SchemaCommands,
        ScheduleCommands,
        SanctumCommands,
        SailCommands,
        RouteCommands,
        QueueCommands,
        PackageCommands,
        OptimizeCommands,
        NotificationsCommands,
        ModelCommands,
        MigrateCommands,
        MakeCommands,
        CommonCommands
    },

    data() {
        return {};
    },

    methods: {}
}
</script>

<template>
    <index-screen title="Commands" resource="commands">
        <div slot="table-header">
            <common-commands/>
            <auth-commands/>
            <cache-commands/>
            <channel-commands/>
            <config-commands/>
            <db-commands/>
            <env-commands/>
            <event-commands/>
            <key-commands/>
            <lang-commands/>
            <make-commands/>
            <migrate-commands/>
            <model-commands/>
            <notifications-commands/>
            <optimize-commands/>
            <package-commands/>
            <queue-commands/>
            <route-commands/>
<!--            <sail-commands/>-->
            <sanctum-commands/>
            <schedule-commands/>
<!--            <schema-commands/>-->
            <session-commands/>
            <storage-commands/>
            <stub-commands/>
            <vendor-commands/>
            <view-commands/>
        </div>
    </index-screen>
</template>
