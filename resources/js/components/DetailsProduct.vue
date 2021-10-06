<template>
    <div class="layout-detail">
        <div class="col">
            <img :src=" '/images/nasgor.jpeg' " class="img-fluid" />
            <div class="col">
                <label for="nama_produk" class="nama_produk">Nasi Goreng Spesial</label>
                <label for="harga_produk" class="harga_produk">Rp 20.000</label>
            </div>
                <div class="col quantity buttons_added">
                    <label for="jumlah_pemesanan" class="jumlah_pemesanan">Jumlah Pesanan</label>
                    <input type="button" value="-" class="minus">
                    <input type="number" step="1" min="1" max="" name="jumlah_pesan" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" id="quantity">
                    <input type="button" value="+" class="plus">
                    <hr>
                </div>

            <form>
                <div class="col">
                    <label for="rincian_produk" class="rincian_produk">Rincian Produk</label>
                    <label for="deskripsi" class="deskripsi">Nasi Goreng Dengan campuran Sosis dan Seafood</label>
                    <button type="submit" class="btn primary mx-auto d-block">Tambah ke Keranjang</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style>
.layout-detail {
    font-family: 'Montserrat', sans-serif;
    margin-top: 30px;
    margin-bottom: 40px;
}

.img-fluid {
    padding: 10px 10px 10px 10px;
}

.form-item {
    margin: 1em auto;
}

.col .nama_produk {
    font-size: 24px;
}

.col .harga_produk {
    font-size: 18px;
}

.col .rincian_produk {
    font-size: 16px;
    font-weight: normal;
    color: #181725;
}

.col .deskripsi {
    font-size: 13px;
    font-weight: normal;
    color: #B0B0B0;
    margin-bottom: 20px;
}

label {
    font-family: 'Montserrat', sans-serif;
    display: flex;
    font-weight: bold;
}

/* -- quantity box -- */

.quantity {
    display: inline-block; }

.quantity .input-text.qty {
    width: 35px;
    height: 39px;
    padding: 0 5px;
    text-align: center;
    background-color: transparent;
    border: 1px solid #efefef;
}

.quantity.buttons_added {
    text-align: right;
    position: relative;
    white-space: nowrap;
    vertical-align: top; }

.quantity.buttons_added input {
    display: inline-block;
    margin: 0;
    vertical-align: top;
    box-shadow: none;
}

.quantity.buttons_added label {
    float: left;
    justify-content: left;
    font-size: 16px;
    margin: 12px 0 0 0;
    vertical-align: top;
    box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
    padding: 7px 10px 8px;
    height: 41px;
    background-color: #ffffff;
    border: 1px solid #efefef;
    cursor:pointer;}

.quantity.buttons_added .minus {
    border-right: 0; }

.quantity.buttons_added .plus {
    border-left: 0; }

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
    background: #eeeeee; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    margin: 0; }

.quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
    outline: none; }
</style>
