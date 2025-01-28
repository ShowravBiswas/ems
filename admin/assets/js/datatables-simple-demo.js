    // window.addEventListener('DOMContentLoaded', event => {
    //     // Simple-DataTables
    //     // https://github.com/fiduswriter/Simple-DataTables/wiki
    //
    //     const datatablesSimple = document.getElementById('datatablesSimple');
    //     if (datatablesSimple) {
    //         new simpleDatatables.DataTable(datatablesSimple);
    //     }
    // });


window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            perPage: 5, // Number of rows per page
            perPageSelect: [5, 10, 15], // Option to select number of rows per page
            searchable: true, // Enable search functionality
            sortable: true, // Enable column sorting
        });
    }
});
