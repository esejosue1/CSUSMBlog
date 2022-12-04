window.onload = function() {
    console.log('script loaded after page load!');
    document.getElementById('create-post-form').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('submit event fired');
    });
}
