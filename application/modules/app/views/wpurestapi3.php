<script>
    let mahasiswa = {
        nama: "sandhika",
        npm: "1083189",
        email: "sandhika@gmail.com"
    }

    json_mahasiswa = JSON.stringify(mahasiswa);

    console.log(mahasiswa);
    console.log('\n');
    console.log(json_mahasiswa);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let mahasiswa = this.responseText;
            console.log(mahasiswa);
        }
    }
</script>