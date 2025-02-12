(function(){
    launchMessage();
})();

function launchMessage()
{
    const toastMessage = document.getElementById('toast-message');

    if (toastMessage) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastMessage);
        toastBootstrap.show();
    }
}