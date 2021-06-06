function retrieve_category_details(){
    let payload = {
    category: document.getElementById('category').value,
    };
    let data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    fetch("retrieve_category_details.php",
    {
        method: "POST",
        body: data
    })
    .then(function(res){ return res.json(); })
    .then(function(data){ display_data(data) })
}

function display_data(data){
    const total = data.length;
    let authors = '';
    let titles = '';
    data.forEach(function(entry,idx,array) {
        if(idx === array.length - 1){
            titles+=entry.title;
            authors+=entry.author;
        }else{
            titles+=entry.title + ',';
            authors+=entry.author + ',';
        }
    });
    document.getElementById('total').innerHTML=total;
    document.getElementById('titles').innerHTML=titles;
    document.getElementById('authors').innerHTML=authors;
}

document.getElementById('category').addEventListener('change', (event) => {
    retrieve_category_details();
});

window.addEventListener('load', (event) => {
    retrieve_category_details();
});