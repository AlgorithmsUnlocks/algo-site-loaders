/*
* Algo Site Loaders Frontend JS
* Algo Site Loaders - Container hide and show based on the selected loader
*/
document.addEventListener('DOMContentLoaded', function () {
    const loaderTypeSelect = document.getElementById('wpSitesloaderType');
    const loader1 = document.getElementById('wp-sites-loader1');
    const loader2 = document.getElementById('wp-sites-loader2');
    const messageElement = document.getElementById('saveMessage');
    const wpSitesLoaderContainer = document.getElementById('wp-sites-loader-wrapper');

    const savedLoader = localStorage.getItem('selectedLoader');

    if (savedLoader) {
        showSelectedLoader(savedLoader);
        loaderTypeSelect.value = savedLoader;
    }
    function showSelectedLoader(wpSitesloaderType) {

        loader1.style.display = 'none';
        loader2.style.display = 'none';
        wpSitesLoaderContainer.style.display = 'none';


        if (wpSitesloaderType === 'wp-sites-loader1') {
            loader1.style.display = 'block';
            wpSitesLoaderContainer.style.display = 'block';
            setTimeout(function () {
                loader1.style.display = 'none';
                wpSitesLoaderContainer.style.display = 'none';
            },500);
        } else if (wpSitesloaderType === 'wp-sites-loader2') {
            loader2.style.display = 'block';
            wpSitesLoaderContainer.style.display = 'block';
            setTimeout(function () {
                loader2.style.display = 'none';
                wpSitesLoaderContainer.style.display = 'none';
            },500);
        }
    }
    function saveLoader() {
        const selectedLoader = loaderTypeSelect.value;
        localStorage.setItem('selectedLoader', selectedLoader);
    }
    window.showLoader = function () {
        const selectedLoader = loaderTypeSelect.value;
        showSelectedLoader(selectedLoader);
        saveLoader();
    };
});
