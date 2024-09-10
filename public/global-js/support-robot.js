function robotSupport() {
    var supportList = document.getElementById('support-list');
    if (supportList.style.display === 'none' || supportList.style.display === '') {
        supportList.style.display = 'block';
        document.addEventListener('click', hideSupportListOnClickOutside);
    } else {
        supportList.style.display = 'none';
        document.removeEventListener('click', hideSupportListOnClickOutside);
    }
}

function hideSupportListOnClickOutside(event) {
    var supportList = document.getElementById('support-list');
    var fixedElement = document.getElementById('fixed-element');
    if (!supportList.contains(event.target) && !fixedElement.contains(event.target)) {
        supportList.style.display = 'none';
        document.removeEventListener('click', hideSupportListOnClickOutside);
    }
}
