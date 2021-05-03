function validateForm()
{
    var current = new Date();
    var startDate = document.getElementById('start_date_at').value;
    var currentDate = formatDate(current);
    if(startDate <= currentDate){
        document.getElementById('error-date-text').innerHTML = 'Ngày thuê không được nhỏ hơn hoặc bằng ngày hôm nay.';
        return false;
    }
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}