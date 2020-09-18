let btns = Array.from(document.querySelectorAll('#edit'));
btns.forEach(btn => {
    btn.addEventListener('click', async() => {
        try {
            let data = btn.dataset.asset;
            let nama = document.getElementById('nama_asset');
            let plat = document.getElementById('plat_nomor');
            let perolehan = document.getElementById('tgl_perolehan');
            let pajak = document.getElementById('tgl_pajak');
            let id = document.getElementById('id');
            let res = await axios.post('http://127.0.0.1:8000/admin/asset/edit-asset', {data:data});
            nama.value = res.data[0]['nama_asset'];            
            plat.value = res.data[0]['plat_nomor'];            
            perolehan.value = res.data[0]['tgl_perolehan'];            
            pajak.value = res.data[0]['tgl_pajak'];         
            id.value = res.data[0]['id'];   
            // console.log(res);
        } catch (error) {
            throw error.message;

        }
    })
})