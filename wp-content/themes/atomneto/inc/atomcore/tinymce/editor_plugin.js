
(function() {
    tinymce.create('tinymce.plugins.atomcoreshortcodes', {
        init: function(ed, url) {

            ed.addCommand('mceatomcoreshortcodes', function() {
                ed.windowManager.open({
// call content via admin-ajax, no need to know the full plugin path
                    file: ajaxurl + '?action=atomcoreshortcodes_tinymce',
                    width: 420 + ed.getLang('atomcoreshortcodes.delta_width', 0),
                    height: 500 + ed.getLang('atomcoreshortcodes.delta_height', 0),
                    inline: 1
                }, {
                    plugin_url: url // Plugin absolute URL
                });
            });

// Register example button
            ed.addButton('atomcoreshortcodes', {
                title: 'atomcoreshortcodes',
                cmd: 'mceatomcoreshortcodes',
                image: url + '/atomcoreshortcodes.png'
            });

// Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function(ed, cm, n) {
                cm.setActive('atomcoreshortcodes', n.nodeName == 'IMG');
            });
        },
        getInfo: function() {
            return {
                longname: 'atomcoreshortcodes',
                author: 'ThemeFocus',
                authorurl: 'http://themefocus.co',
                infourl: 'http://atomcore.themefocus.co',
                version: "1.0"
            };
        }
    });

// Register plugin
    tinymce.PluginManager.add('atomcoreshortcodes', tinymce.plugins.atomcoreshortcodes);
})();

