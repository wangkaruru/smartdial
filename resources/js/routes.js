import VueRouter from 'vue-router'

let routes = [
    {
        path: '/',
        component: require('./layouts/app'),
        children: [
  {
                path: '/home',
                name: 'home',
                component: require('./views/home')
            },

          
            // {
            //     path: '/logout',
            //     name: 'logout',
            //     component: require('./views/logout')
            // },
          
        
            {
                path: '/report',
                name: 'report',
                component: require('./views/report')
            },
            {
                path: '/reports/whiteboard',
                name: 'reports.whiteboard',
                component: require('./views/reports/whiteboard.vue')
            },
            {
                path: '/reports/exportcall',
                name: 'reports.exportcall',
                component: require('./views/reports/exportcall.vue')
            },
            {
                path: '/reports/agentperformance',
                name: 'reports.agentperformance',
                component: require('./views/reports/agentperformance.vue')
            },
            {
                path: '/reports/agenttime',
                name: 'reports.agenttime',
                component: require('./views/reports/agenttime.vue')
            },
            {
                path: '/reports/teamperformance',
                name: 'reports.teamperformance',
                component: require('./views/reports/teamperformance.vue')
            },
            {
                path: '/reports/userstats',
                name: 'reports.userstats',
                component: require('./views/reports/userstats.vue')
            },
            {
                path: '/reports/outbound',
                name: 'reports.outbound',
                component: require('./views/reports/outbound.vue')
            },
            {
                path: '/reports/main-report',
                name: 'reports.main-report',
                component: require('./views/reports/main-report.vue')
            },
            
            {
                path: '/users',
                name: 'users',
                component: require('./views/users/index'),
            },
            {
                path: '/users/create',
                name: 'users.create',
                component: require('./views/users/create')
            },
            {
                path: '/users/update',
                name: 'users.update',
                component: require('./views/users/update')
            },
            {
                path: '/users/stats/:user_id',
                name: 'users.stats',
                component: require('./views/users/stats')
            },
            {
                path: '/campaigns/:campaign_id/update',
                name: 'campaigns.update',
                component: require('./views/campaigns/update')
            },
            {
                path: '/campaigns',
                name: 'campaigns.index',
                component: require('./views/campaigns/index')
            },
            {
                path: '/campaigns/create',
                name: 'campaigns.create',
                component: require('./views/campaigns/create')
            },
            {
                path: '/campaigns/:campaign_id/status',
                name: 'campaigns.status',
                component: require('./views/campaigns/status')
            },
            {
                path: '/campaigns/auto-alt-dial',
                name: 'campaigns.autoaltdial',
                component: require('./views/campaigns/autoaltdial')
            },
            {
                path: '/campaigns/hot-keys',
                name: 'campaigns.hotkeys',
                component: require('./views/campaigns/hotkeys')
            },
            {
                path: '/campaigns/list-mix',
                name: 'campaigns.listmix',
                component: require('./views/campaigns/listmix')
            },
            {
                path: '/campaigns/pause-codes',
                name: 'campaigns.pausecodes',
                component: require('./views/campaigns/pausecodes')
            },
            {
                path: '/campaigns/presets',
                name: 'campaigns.presets',
                component: require('./views/campaigns/presets')
            },
            {
                path: '/campaigns/ac-cids',
                name: 'campaigns.ac-cids',
                component: require('./views/campaigns/ac-cids')
            },
            
            {
                path: '/campaigns/recycles-update',
                name: 'campaigns.recycles-update',
                component: require('./views/campaigns/recycles-update')
            },
            {
                path: '/campaigns/recycles',
                name: 'campaigns.recycles',
                component: require('./views/campaigns/recycles')
            },
            {
                path: '/campaigns/statuses',
                name: 'campaigns.statuses',
                component: require('./views/campaigns/statuses')
            },
            {
                path: '/campaigns/statusesedit',
                name: 'campaigns.statusesedit',
                component: require('./views/campaigns/statusesedit')
            },
            {
                path: '/lists',
                name: 'lists.index',
                component: require('./views/lists/index')
            },
            {
                path: '/lists/create',
                name: 'lists.create',
                component: require('./views/lists/create')
            },
            {
                path: '/lists/:list_id/update',
                name: 'lists.update',
                component: require('./views/lists/update')
            },
            {
                path: '/scripts',
                name: 'scripts.index',
                component: require('./views/scripts/index')
            },
            {
                path: '/scripts/create',
                name: 'scripts.create',
                component: require('./views/scripts/create')
            },
            {
                path: '/filters',
                name: 'filters.index',
                component: require('./views/filters/index')
            },
            {
                path: '/filters/create',
                name: 'filters.create',
                component: require('./views/filters/create')
            },
            {
                path: '/filters/update',
                name: 'filters.update',
                component: require('./views/filters/update')
            },
            {
                path: '/in-bound/in-group',
                name: 'inbound.ingroup.index',
                component: require('./views/inbound/ingroup/index')
            },
            {
                path: '/in-bound/in-group/create',
                name: 'inbound.ingroup.create',
                component: require('./views/inbound/ingroup/create')
            },
            {
                path: '/in-bound/in-group/update',
                name: 'inbound.ingroup.update',
                component: require('./views/inbound/ingroup/update')
            },
            {
                path: '/in-bound/call-menus',
                name: 'inbound.callmenus.index',
                component: require('./views/inbound/callmenus/index')
            },
            {
                path: '/in-bound/call-menus/create',
                name: 'inbound.callmenus.create',
                component: require('./views/inbound/callmenus/create')
            },
            {
                path: '/in-bound/chat-groups',
                name: 'inbound.chatgroups.index',
                component: require('./views/inbound/chatgroups/index')
            },
            {
                path: '/in-bound/chat-groups/create',
                name: 'inbound.chatgroups.create',
                component: require('./views/inbound/chatgroups/create')
            },
            {
                path: '/in-bound/dids',
                name: 'inbound.dids.index',
                component: require('./views/inbound/dids/index')
            },
            {
                path: '/in-bound/dids',
                name: 'inbound.dids.update',
                component: require('./views/inbound/dids/update')
            },
            {
                path: '/in-bound/dids/create',
                name: 'inbound.dids.create',
                component: require('./views/inbound/dids/create')
            },
            {
                path: '/in-bound/filter-phone-groups',
                name: 'inbound.filterphonegroups.index',
                component: require('./views/inbound/filterphonegroups/index')
            },
            {
                path: '/in-bound/filter-phone-groups/create',
                name: 'inbound.filterphonegroups.create',
                component: require('./views/inbound/filterphonegroups/create')
            },
            {
                path: '/user-groups',
                name: 'usergroups.index',
                component: require('./views/usergroups/index')
            },
            {
                path: '/user-groups/create',
                name: 'usergroups.create',
                component: require('./views/usergroups/create')
            },
            {
                path: '/user-groups/bulk-group-change',
                name: 'usergroups.bulk-group-change',
                component: require('./views/usergroups/bulk-group-change')
            },
            {
                path: '/user-groups/group-hourly-reports',
                name: 'usergroups.group-hourly-reports',
                component: require('./views/usergroups/group-hourly-reports')
            },
            {
                path: '/remotea-gents/create',
                name: 'remoteagents.create',
                component: require('./views/remoteagents/create')
            },
            {
                path: '/remote-agents/add-extension-group',
                name: 'remoteagents.add-extension-group',
                component: require('./views/remoteagents/add-extension-group')
            },
            {
                path: '/remote-agents/index',
                name: 'remoteagents.index',
                component: require('./views/remoteagents/index')
            },
            {
                path: '/remote-agents/extension-groups',
                name: 'remoteagents.extension-groups',
                component: require('./views/remoteagents/extension-groups')
            },
           
            {
                path: '/admin/calltimes',
                name: 'admin.calltimes',
                component: require('./views/admin/calltimes')
            },
            {
                path: '/admin/phones',
                name: 'admin.phones',
                component: require('./views/admin/phones')
            },
            {
                path: '/admin/carriers',
                name: 'admin.carriers',
                component: require('./views/admin/carriers')
            },
            {
                path: '/admin/servers',
                name: 'admin.servers',
                component: require('./views/admin/servers')
            },
            {
                path: '/admin/conferences',
                name: 'admin.conferences',
                component: require('./views/admin/conferences')
            },
            {
                path: '/admin/systemstatuses',
                name: 'admin.systemstatuses',
                component: require('./views/admin/systemstatuses')
            },
            {
                path: '/admin/musiconhold',
                name: 'admin.musiconhold',
                component: require('./views/admin/musiconhold')
            },
            {
                path: '/admin/systemcontainers',
                name: 'admin.systemcontainers',
                component: require('./views/admin/systemcontainers')
            },
            {
                path: '/admin/voicemail',
                name: 'admin.voicemail',
                component: require('./views/admin/voicemail')
            },
            {
                path: '/admin/audiostore',
                name: 'admin.audiostore',
                component: require('./views/admin/audiostore')
            },
            {
                path: '/admin/systemsettings',
                name: 'admin.systemsettings',
                component: require('./views/admin/systemsettings')
            }


        ]
    },
    /* {
         path: '*',
         component: require('./layouts/error-page'),
         children: [
             {
                 path: '*',
                 component: require('./views/errors/page-not-found')
             }
         ]
     }*/
];

const router = new VueRouter({
    routes,
    mode: 'history'
});


export default router;