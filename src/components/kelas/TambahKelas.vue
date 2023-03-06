<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Kelas</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                            <div class="card card-success card-outline">
                                <div class="card-body">
                                    <form @submit.prevent="save">
                                        <label for="nama" class="form-label">Nama Kelas:</label>
                                        <input type="text" class="form-control" v-model="kelas.nama_kelas" id="nama" autocomplete="off" placeholder="Masukkan nama kelas..">

                                        

                                        <br>
                                        <input type="submit" class="btn btn-primary">

                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    
   data(){
        return{
            kelas:{}
        }
   },
   methods: {
        save(){
            this.save_data();
        },
        save_data(){
            axios.post('http://127.0.0.1:8000/api/createkelas', this.kelas)
            .then(
                ({data}) => {
                    alert("Berhasil Tambah kelas");
                    this.$router.push('/kelas');
                    this.buku = data;
                }
            )
        },
   }
}
</script>