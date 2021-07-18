function exportToCustomer(type) {
    $('#customer').tableExport({
        filename: 'customer_%DD%-%MM%-%YY%',
        format: type,
        cols: '1,2,3,4,5,6,7,8'
    });
}

function exportToVenues(type) {
    $('#venue').tableExport({
        filename: 'Venues_%DD%-%MM%-%YY%',
        format: type,
        cols: '1,2,3,4,5,6,7,8,9'
    });
}

function exportToEvents(type) {
    $('#events').tableExport({
        filename: 'Events_%DD%-%MM%-%YY%',
        format: type,
        cols: '1,2,3,4,5,6'
    });
}

function exportToCaterer(type) {
    $('#caterers').tableExport({
        filename: 'Caterers_%DD%-%MM%-%YY%',
        format: type,
        cols: '1,2,3,4,5,6,7,8,9,10'
    });
}

function exportToReservations(type) {
    $('#reservations').tableExport({
        filename: 'Reservations_%DD%-%MM%-%YY%',
        format: type,
        cols: '1,2,3,4,5,6,7,8,9,10'
    });
}