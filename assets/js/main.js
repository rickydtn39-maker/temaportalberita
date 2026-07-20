function updateClock(){

    const now=new Date();

    const hari=[
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    ];

    const bulan=[
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    document.getElementById("today-date").innerHTML=
    hari[now.getDay()] + ", " +
    now.getDate()+" "+
    bulan[now.getMonth()]+" "+
    now.getFullYear();

    document.getElementById("today-time").innerHTML=
    now.toLocaleTimeString(
        "id-ID",
        {
            hour:"2-digit",
            minute:"2-digit"
        }
    )+" WIB";

}

updateClock();

setInterval(updateClock,1000);