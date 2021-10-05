<template>
    <form class="layout-pemesanan" action="/" method="post" autocomplete="on">
        <div class="form-item row">
        <div class="col form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama"/>
        </div>
        <div class="col form">
            <label for="noTelepon">No Telepon</label>
            <input type="number" name="noTelepon" id="noTelepon" />
        </div>
        </div>

        <div class="form-item row">
        <div class="col form">
            <label for="catatan">Catatan</label>
            <textarea placeholder="Contoh: Extra saus ya!" rows="4"></textarea>
        </div>
        </div>

        <div class="form-item row">
        <div class="col form">
            <label for="rangkuman" class="rangkuman">Rangkuman Pesanan</label>
            <div class="col">
                <label for="pesanans1" class="pesanans1">1x Ayam</label>
                <label for="pesanans2" class="pesanans2">1x Nasi Goreng Spesial</label>
            </div>
            <label for="total" class="total">Total</label>
        </div>
        <div class="row form">
            <div class="col">
                <button type="button" class="tambah_pesanan">Tambahkan Pesanan</button>
                <label for="pesanan1" class="pesanan1">Rp 10.000</label>
                <label for="pesanan2" class="pesanan2">Rp 20.000</label>
                <label for="total_harga" class="total_harga">Rp 30.000</label>
            </div>
        </div>
        </div>
        <hr class="class-5" />
        <div class="form-item row">
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
    user-select: none;
    overflow-x: auto;
}

.col label {
    font-size: 12px;
}

.col .rangkuman {
    font-size: 16px;
    font-weight: normal;
}

.col .pesanans1 {
    margin-top: 5px;
    font-size: 14px;
    font-weight: normal;
}

.col .pesanans2 {
    font-size: 14px;
    font-weight: normal;
}

.col .total {
    font-size: 14px;
    font-weight: 600;
}

.row .tambah_pesanan {
    font-size: 9px;
    font-weight: 300;
    color: #4DA9FF;
    text-align: right;
    border: 0;
    background-color: #FFFFFF;
    cursor: pointer;
}

.row .pesanan1 {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.row .pesanan2 {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.row .total_harga {
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    text-align: right;
}

.form-item {
    margin: 1em auto;
}

.form-item label {
    display: block;
    font-weight: bold;
}

.form-item input {
    border: 1px solid grey;
    border-radius: 10px;
    width: 100%;
    padding: 5px 10px 5px 10px;
}

.form-item textarea {
    border: 1px solid grey;
    border-radius: 10px;
    width: 100%;
    padding: 5px 10px 5px 10px;
}

.form-item select {
    border: 1px solid grey;
    border-radius: 5px;
    width: 100%;
}

hr.class-5 {
            background-color: #fff;
            border-top: 2px dashed #8c8b8b;
        }

.btn {
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
