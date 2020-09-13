let btns = Array.from(document.querySelectorAll('#edit'));
btns.forEach(btn => {
    btn.addEventListener('click', async() => {
        try {
            let data = btn.dataset.asset;
            let nama = document.getElementById('nama');
            let jumlah = document.getElementById('jumlah');
            let service = document.getElementById('tgl_service');
            let pajak = document.getElementById('tgl_pajak');
            let no_asset = document.getElementById('no_asset');
            let res = await axios.post('http://127.0.0.1:8000/admin/asset/edit-asset', {no_asset:data});
            nama.value = res.data[0]['nama'];
            service.value = res.data[0]['tgl_service'];
            pajak.value = res.data[0]['tgl_pajak'];
            no_asset.value = res.data[0]['no_asset'];
            jumlah.value = res.data[0]['jumlah']
        } catch (error) {
            throw error;
        }
    })
})