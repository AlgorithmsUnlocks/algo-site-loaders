/*
* Algo Site Loaders Admin JS
*/

document.addEventListener('DOMContentLoaded', function() {
    function showLoader() {
        const loader = document.getElementById('plugin-loader');
        const wp_main_container = document.querySelector('.wp-sites-loader-container');
        if (loader) {
            loader.style.display = 'block';
        }
    }
    function hideLoader() {
        const loader = document.getElementById('plugin-loader');
        const wp_main_container = document.querySelector('.wp-sites-loader-container');
        if (loader) {
            loader.style.display = 'none';
        }
    }
    function loadPluginContent() {
        showLoader();
        setTimeout(function() {
            hideLoader();
            const content = document.getElementById('plugin-content');
            if (content) {
                content.innerHTML = "<p>Loaded content</p>";
            }
        }, 100);
    }
    loadPluginContent();
});

/*
 * WP Sites Loader Container hide and show based on the selected loader -> Algo Unlocks
 */

document.addEventListener('DOMContentLoaded', function () {
    const loaderTypeSelect = document.getElementById('wpSitesloaderType');
    const loader1 = document.getElementById('wp-sites-loader1');
    const loader2 = document.getElementById('wp-sites-loader2');
    const messageElement = document.getElementById('saveMessage');
    const wpSitesloaderName = document.getElementById('wpSitesloaderName');

    const savedLoader = localStorage.getItem('algo_site_loaders_selectedLoader');
    const savedColor = localStorage.getItem('algo_site_loaders_selectedColor');

    if (savedLoader && savedColor) {
        showSelectedLoader(savedLoader);
        loaderTypeSelect.value = savedLoader;

        const colorInput = document.getElementById('loaderColor');
        colorInput.value = savedColor;

        // applyLoaderStyle(savedLoader, savedColor);
        applyLoaderStyle(savedLoader);
    }

    function showSelectedLoader(wpSitesloaderType) {
        loader1.style.display = 'none';
        loader2.style.display = 'none';
        wpSitesloaderName.style.display = 'none';

        if (wpSitesloaderType === 'wp-sites-loader1') {
            loader1.style.display = 'block';
            wpSitesloaderName.style.display = 'inline-block';
            wpSitesloaderName.innerHTML = 'Loader 1';
        } else if (wpSitesloaderType === 'wp-sites-loader2') {
            loader2.style.display = 'block';
            wpSitesloaderName.style.display = 'inline-block';
            wpSitesloaderName.innerHTML = 'Loader 2';
        }
    }
    function applyLoaderStyle(loaderType, color) {
        if (loaderType === 'wp-sites-loader1') {
            loader1.style.borderTopColor = color;
            // loader1.style.borderColor = color;
            // loader2.style.backgroundColor = color;
        } else if (loaderType === 'wp-sites-loader2') {
            loader2.style.borderTopColor = color;
            // loader2.style.borderColor = color;
            // loader2.style.backgroundColor = color;
        }
    }
    function saveLoaderToDatabase() {
        const selectedLoader = loaderTypeSelect.value;
        const colorInput = document.getElementById('loaderColor');
        const selectedColor = colorInput.value;

        // Send an AJAX request to the server
        const xhr = new XMLHttpRequest();
        xhr.open('POST', ajaxurl, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Show success message or perform other actions upon successful save
                        messageElement.innerText = response.data;
                        messageElement.style.display = 'block';
                        setTimeout(function () {
                            messageElement.style.display = 'none';
                        }, 3000);
                    } else {
                        console.error('Error:', response.data);
                    }
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };

        // Prepare data to send in the AJAX request
        const data = new URLSearchParams();
        data.append('action', 'save_loader_options');
        data.append('algo_site_loaders_selectedLoader', selectedLoader);
        data.append('algo_site_loaders_selectedColor', selectedColor);

        // Add nonce
        const nonce = document.querySelector('.loader-nonce').getAttribute('data-nonce');
        data.append('algo_site_loaders_nonce', nonce);

        xhr.send(data);
    }

    window.showLoader = function () {
        const selectedLoader = loaderTypeSelect.value;
        const colorInput = document.getElementById('loaderColor');
        const selectedColor = colorInput.value;

        applyLoaderStyle(selectedLoader);
        showSelectedLoader(selectedLoader);
        saveLoaderToDatabase();
    };

    if (loaderTypeSelect) {

        loaderTypeSelect.addEventListener('change', function() {
            const selectedLoader = loaderTypeSelect.value;
            const colorInput = document.getElementById('loaderColor');
            const selectedColor = colorInput.value;

            // applyLoaderStyle(selectedLoader, selectedColor);
            applyLoaderStyle(selectedLoader);
            showSelectedLoader(selectedLoader);
        });
    }

});