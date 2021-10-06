<template>
    <form class="layout-pemesanan" action="/" method="post" autocomplete="on">
        <div class="form-item row">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama"/>
        </div>

        <div class="form-item row">
            <label for="noTelepon">No Telepon</label>
            <input type="number" name="noTelepon" id="noTelepon" />
        </div>

        <div class="form-item row">
            <label for="catatan">Catatan</label>
            <textarea placeholder="Contoh: Extra saus ya!" rows="4"></textarea>
        </div>

        <div class="form-item row">
            <label for="rangkuman" class="rangkuman">Rangkuman Pesanan</label>
            <div class="col">
                <button type="button" class="tambah_pesanan">Tambahkan Pesanan</button>
            </div>
        </div>

        <div class="form-item row">
            <label for="pesanans1" class="pesanans1">1x Ayam</label>
            <div class="col">
                 <label for="pesanan1" class="pesanan1">Rp 10.000</label>
            </div>
        </div>

        <div class="form-item row">
            <label for="pesanans2" class="pesanans2">1x Nasi Goreng Spesial</label>
            <div class="col">
                <label for="pesanan2" class="pesanan2">Rp 20.000</label>
            </div>
        </div>

        <div class="form-item row">
            <label for="total" class="total">Total</label>
            <div class="col">
                <label for="total_harga" class="total_harga">Rp 30.000</label>
            </div>
        </div>
        <hr class="class-5" />
        <div class="form-item">
            <select>
                <option value="" selected disabled hidden>Pilih Metode Pembayaran</option>
                <option>Tunai</option>
                <option>Debit/Kredit</option>
            </select>
        </div>
        <div class="justify-content-center">
            <button type="submit" class="btn primary mx-auto d-block">Pesan</button>
        </div>
    </form>
</template>

<script>
export default {}
</script>

<style>
.layout-pemesanan {
    font-family: 'Montserrat', sans-serif;
    padding: 20px 30px;
    margin: 10px 10px 10px 10px;
}

.form-item .rangkuman {
    font-size: 16px;
    font-style: normal;
    font-weight: 300;
}

.form-item .pesanans1 {
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
}

.form-item .pesanans2 {
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
}

.form-item .total {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
}

.form-item .col .tambah_pesanan {
    font-size: 10px;
    font-weight: 300;
    float: right;
    color: #4DA9FF;
    text-align: right;
    border: 0;
    background-color: #FFFFFF;
    cursor: pointer;
}

.form-item .col .pesanan1 {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.form-item .col .pesanan2 {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.form-item .col .total_harga {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.form-item {
    margin: 1em auto;
}

.form-item .col label {
    font-family: 'Montserrat', sans-serif;
    display: block;
    font-weight: bold;
    font-size: 12px;
}

.form-item input {
    font-family: 'Montserrat', sans-serif;
    border: 1px solid grey;
    border-radius: 10px;
    width: 100%;
    padding: 5px 10px 5px 10px;
}

.form-item textarea {
    font-family: 'Montserrat', sans-serif;
    border: 1px solid grey;
    border-radius: 10px;
    width: 100%;
    padding: 5px 10px 5px 10px;
}

.form-item select {
    font-family: 'Montserrat', sans-serif;
    border: 1px solid grey;
    border-radius: 5px;
    width: 100%;
    padding: 7px 5px 7px 5px;
}

.form-item option {
    font-family: 'Montserrat', sans-serif;
}

hr.class-5 {
            background-color: #fff;
            border-top: 2px dashed #8c8b8b;
        }

.btn {
    font-family: 'Montserrat', sans-serif;
    display: flex;
    font-size: 18px;
    width: 100%;
    height: 55px;
    border: 1px solid;
    border-radius: 10px;
    padding: 14px 28px;
    cursor: pointer;
}

.primary {
    background-color: #4DA9FF;
    color: #FFFFFF;
}
</style>
