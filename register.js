const register = document.querySelector('input[type="submit"]')
const form = document.getElementById('form');
register.addEventListener('click', () => {
    var status
    const form = document.getElementById('form');
    const formData = new FormData(form);

    fetch('http://localhost:8080/Model.php', {
            'method': "POST",
            'body': formData,
            'mode': "no-cors",
            
        })
        .then(res => {
            status = res.status
            console.log(status)
            return res.text();
        })
        .then(data => {
            alert(data);
            
               
        })
        .catch(err => { console.log(err) })
})


