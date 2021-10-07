<template>
    <div style="padding: 10px;">
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="onUpload">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" v-model="menu.nama">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" v-model="menu.kategori">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" v-model="menu.stock">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" v-model="menu.harga">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" v-model="menu.deskripsi">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" v-on:change="onFileSelected">
                        <!-- <div v-if="validation.title">
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ validation.title[0] }}
                            </div>
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                menu: {
                    nama: null,
                    kategori: null,
                    foto_menu: null,
                    stock: null,
                    harga: null,
                    deskripsi: null
                }
            }
        },
        methods: {
            onFileSelected(e) {
                this.foto_menu = e.target.files[0];
            },
            onUpload() {
                const menu = new FormData();
                menu.append('nama', this.nama);
                menu.append('kategori', this.kategori);
                menu.append('foto_menu', this.foto_menu);
                menu.append('stock', this.stock);
                menu.append('harga', this.harga);
                menu.append('deskripsi', this.deskripsi);
                _.each(this.menu, (value, key) => {
                    menu.append(key, value)
                })
                axios.post('/api/menu', menu).then((response) => {
                    this.$router.push({
                        name: 'main'
                    });
                }).catch(error => {
                console.log("ERRRR:: ",error.response.data);
                });
            }
        }
    }
</script>