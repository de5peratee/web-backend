window.onload = function() {
    document.body.style.visibility = 'visible';
    var dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseover', function() {
            var dropdownContent = this.querySelector('.dropdown-content');
            dropdownContent.style.right = 'auto';
            dropdownContent.style.display = 'block';
            var rect = dropdownContent.getBoundingClientRect();
            if (rect.right > window.innerWidth) {
                dropdownContent.style.right = '0';
            }
        });
        dropdown.addEventListener('mouseout', function() {
            var dropdownContent = this.querySelector('.dropdown-content');
            dropdownContent.style.display = 'none';
        });
    });
}

