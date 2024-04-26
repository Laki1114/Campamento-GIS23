document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('myTable');
    const rows = table.getElementsByTagName('tr');
  
    for (let i = 0; i < rows.length; i++) {
        rows[i].addEventListener('click', function() {
            if (!this.classList.contains('selected')) {
                clearSelectedRows();
                this.classList.add('selected');
            } else {
                this.classList.remove('selected');
            }
        });
    }

    function clearSelectedRows() {
        for (let i = 0; i < rows.length; i++) {
            rows[i].classList.remove('selected');
        }
    }




});
