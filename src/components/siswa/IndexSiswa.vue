<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Anggota</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-info card-outline">
                                <div class="card-body">
                                    <router-link class="btn btn-info mb-2" to="/user/tambah">
                                        <i class="fas fa-plus"></i> Tambah
                                    </router-link>
                                    
                                           
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kelas</th>
                                            <th>gender</th>
                                            <th>alamat</th>
                                            <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="s in siswa" :key="s.id_siswa">
                                                <td>{{ s.id_siswa }}</td>
                                                <td>{{ s.nama_siswa }}</td>
                                                <td>{{ s.nama_kelas }}</td>
                                                <td>{{ s.gender }}</td>
                                                <td>{{ s.alamat }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <router-link :to="{path: '/user/editsiswa/'+s.id_siswa}" class="btn btn-warning"> Edit </router-link>  
                                                        <button type="button" class="btn btn-danger" @click="remove(s)"> Hapus </button>                                                     
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    data() {
            return{
                
                siswa: {},
                kelas: {},
            }
        },
        created() {
            this.GetSiswa();
            this.Datakelas();
        },
        methods: {
            GetSiswa(){
                var page = "http://127.0.0.1:8000/api/getsiswa";
                axios.get(page).then(
                    ({data})=>{
                        console.log(data);
                        this.siswa = data;
                    }
                );
            },
            DataKelas(){
                axios.get('http://127.0.0.1:8000/api/getkelas')
                .then(
                ({data}) => {
                    this.kelas = data
                });
            },
            
            remove(siswa){
                var url = 'http://127.0.0.1:8000/api/deletesiswa/'+ siswa.id_siswa;
                axios.delete(url);
                alert("Sukses delete User");
                this.userLoad;
            }
        },
    }
    </script>