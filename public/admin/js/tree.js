'use strict';
var tree_custom = {
    init: function() {
        $('#treeBasic').jstree({
            'core' : {
                'themes' : {
                    'responsive': false,
                },
            },
            'types' : {
                'defaulst' : { 
                    'icon' : 'ti-gallery'
                },
                'file' : {
                    'icon' : 'ti-file'
                }
            },
            "search": {
                "case_insensitive": true,
                "show_only_matches" : true
            },
            'plugins' : ['types', 'search']
        }).bind("select_node.jstree", function (e, data) {
            var href = data.node.a_attr.href;
            if(href == '#')
            return '';

            window.location.href = href;
        });
        $('#search').keyup(function(){
            $('#treeBasic').jstree('search', $(this).val());
        });
    }
};
(function($) {
    "use strict";
    tree_custom.init()
})(jQuery);