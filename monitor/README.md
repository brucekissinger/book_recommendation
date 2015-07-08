Introduction
============

This directory provides a web-based dashboard for monitoring key aspects of the Book Recommendation application.  It uses the Google Charts and JQuery javascript libraries to provide an attractive display with minimal coding needed for different browswer dependencies.

Pre-requisites
==============
The cloudi.conf file must contain an entry for the cloudi_service_folsom service as follows:

        %
        % Folsom monitoring service
        %
        [{type, internal},
         {prefix, "/folsom/"},
         {module, cloudi_service_folsom},
         {args, []},
         {dest_refresh, immediate_closest},
         {timeout_init, 60000}, 
         {timeout_async, 60000}, 
         {timeout_sync, 60000}, 
         {dest_list_deny, undefined}, 
         {dest_list_allow, undefined}, 
         {count_process, 1}, 
         {max_r, 5}, 
         {max_t, 900}, 
         {options, [{reload, true}, {queue_limit, 500}]}
        ]



