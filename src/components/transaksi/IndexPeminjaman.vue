<template>
    <div>

        <!-- Modal -->
        


        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Peminjaman</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-20">
                            <div class="card card-warning card-outline">
                                <div class="card-body">

                                    <router-link class="btn btn-warning mb-2" to="/Peminjaman/Tambah">
                                        <i class="fas fa-plus"></i> Tambah
                                    </router-link>

                                            <!-- <a href="/tambahpinjam" class="btn btn-primary mb-2">Tambah</a> -->

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">ID</th>
                                                <th>Nama Siswa</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tenggat</th>
                                               
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="p in getpinjam" :key="p.id_peminjaman">
                                                <td>{{ p.id_peminjaman }}</td>
                                                <td>{{ p.nama_siswa }}</td>
                                                <td>{{ p.tgl_pinjam }}</td>
                                                <td>{{ p.tgl_kembali }}</td>
                                                
                                                <td>
                                                    <span v-if="p.status == 'Kembali'"
                                                        class="badge bg-success">Kembali</span>
                                                    <span v-else class="badge bg-danger">Belum kembali</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- <button class="btn btn-success" @click="detail()">Detail</button>   -->
                                                       
                                                        <span v-if="p.status == 'Dipinjam'"><button class="btn btn-warning"
                                                                @click="kembali(p)">Kembali</button></span>
                                                                
                                                        <button type="button" @click="hapus(p)"
                                                            class="btn btn-danger">Hapus</button>
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

import axios from 'axios'
import Vue from 'vue'

Vue.use(axios)
export default {
   
    data() {
        return {
            pinjam: {},
            siswa: {},
            buku: {},
            kelas: {},
            peminjaman: {
                // id_siswa: '',
                // id_kelas: '',
                id_buku: '',
                nama: '',
                alamat: ''
            },
            getpinjam: {},
            getstatus: {},
        }
    },
    created() {
        this.getsiswa()
        this.getbuku()
        this.getpeminjaman()
        this.getkelas()
        // this.filter()
    },
    methods: {
        getsiswa() {
            axios.get('http://localhost:8000/api/getsiswa')
                .then(
                    ({ data }) => {
                        this.siswa = data
                    }
                )
        },
        getbuku() {
            axios.get('http://localhost:8000/api/getbuku')
                .then(
                    ({ data }) => {
                        this.buku = data
                    }
                )
        },
        getkelas() {
            axios.get('http://localhost:8000/api/getkelas')
                .then(
                    ({ data }) => {
                        this.kelas = data
                    }
                )
        },
        save() {
            this.save_data()
        },
        save_data() {
            axios.post('http://localhost:8000/api/createpeminjaman', this.peminjaman)
                .then(
                    ({ data }) => {
                    alert('Sukses tambah peminjaman'), 
                           
                        setTimeout(() => {
                            window.location.reload()
                        }, 1200)
                        this.peminjaman = data
                    }
                )
        },
        getpeminjaman() {
            axios.get('http://localhost:8000/api/getpeminjaman')
                .then(
                    ({ data }) => {
                        this.getpinjam = data
                    }
                )
        },
       
        hapus(p) {
            axios.delete('http://localhost:8000/api/deletepeminjaman/' + p.id_peminjaman)
                    alert('sukses hapus peminjaman')
                    setTimeout(() => {
                        window.location.reload()
                    }, 1200);
                
          
        },
        kembali(p) {
           axios.put('http://localhost:8000/api/updatepeminjaman/' + p.id_peminjaman)
                       alert('sukses mengembalikan peminjaman')
                        setTimeout(() => {
                            window.location.reload()
                        }, 1200);
                    
                
        },
        
    }
}
</script>