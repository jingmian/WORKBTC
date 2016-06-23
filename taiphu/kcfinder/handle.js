var path = '/kcfinder/browse.php?type=images&lng=vi';
var pathFiles = '/kcfinder/browse.php?type=file&lng=vi';
function selectImage(field)
{
    var element = $(field);
    if (element)
    {
        window.KCFinder = {
            callBack: function(url) {
                element.val(url);
                element.trigger('change');
                window.KCFinder = null;
            }
        };
        window.open(path, 'Chọn file hình ảnh', 'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600');
    }
}

function selectFile(field)
{
    var element = $(field);
    if (element)
    {
        window.KCFinder = {
            callBack: function(url) {
                element.val(url);
                element.trigger('change');
                window.KCFinder = null;
            }
        };
        window.open(pathFiles, 'Chọn file ', 'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600');
    }
}