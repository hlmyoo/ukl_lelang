<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Anggota</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                            <div class="card card-info card-outline">
                                <div class="card-body">
                                    <form @submit.prevent="save">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" v-model="siswa.nama_siswa" id="nama" autocomplete="off" placeholder="Masukkan nama..">

                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" v-model="siswa.tanggal_lahir" id="tgl_lahir">

                                        <label for="gender" class="form-label">Gender:</label>
                                        <select v-model="siswa.gender" id="gender" class="form-control">
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                        </select>

                                        <label for="kelas">Kelas:</label>
                                        <select v-model="siswa.id_kelas" id="kelas" class="form-control">
                                        <option v-for="k in kelas" :key="k.id_kelas" :value="k.id_kelas">{{ k.nama_kelas }}</option>
                                        </select>

                                        <label for="alamat" class="form-labek">Alamat:</label>
                                        <textarea v-model="siswa.alamat" id="alamat" class="form-control"></textarea>
                                        <br>
                                        <input type="submit" class="btn btn-info">

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
            siswa:{},
            kelas:{}
        }
   },
   created(){
        this.DataKelas();
   },
   methods: {
        DataKelas(){
            axios.get('http://127.0.0.1:8000/api/getkelas')
            .then(
            ({data}) => {
                this.kelas = data
            }
        );
        },
        save(){
            this.save_data();
        },
        save_data(){
            axios.post('http://127.0.0.1:8000/api/createsiswa', this.siswa)
            .then(
                ({data}) => {
                    alert("Berhasil Tambah Siswa");
                    this.$router.push('/user');
                    this.siswa = data;
                }
            )
        },
   }
}
</script>