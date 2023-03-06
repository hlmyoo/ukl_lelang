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
                                <select v-model="datasiswa.id_siswa" class="form-control" id="nama">
                                    <option v-for="s in siswa" :key="s.id_siswa" :value="s.id_siswa">{{ s.nama_siswa }}
                                    </option>
                                </select>

                                <label for="kelas">Kelas:</label>
                                <select v-model="datasiswa.id_kelas" id="kelas" class="form-control">
                                    <option v-for="k in kelas" :key="k.id_kelas" :value="k.id_kelas">{{ k.nama_kelas }}
                                    </option>
                                </select>

                                <label for="buku">Buku:</label>
                                <select v-model="datasiswa.id_buku" id="buku" class="form-control">
                                    <option v-for="b in buku" :key="b.id_buku" :value="b.id_buku">{{ b.judul_buku }}
                                    </option>
                                </select> <br>
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

    data() {
        return {
            siswa: {},
            kelas: {},
            buku: {},
            datasiswa: {}
        }
    },
    created() {
        this.getsiswa()
        this.getkelas()
        this.getbuku()
    },
    methods: {
        getsiswa() {
            axios.get('http://127.0.0.1:8000/api/getsiswa')
                .then(
                    ({ data }) => {
                        this.siswa = data
                    }
                );
        },
        getkelas() {
            axios.get('http://127.0.0.1:8000/api/getkelas')
                .then(
                    ({ data }) => {
                        this.kelas = data
                    }
                );
        },
        getbuku() {
            axios.get('http://127.0.0.1:8000/api/getbuku')
                .then(
                    ({ data }) => {
                        this.buku = data
                    }
                );
        },
        save() {
            this.save_data();
        },
        save_data() {
            axios.post('http://127.0.0.1:8000/api/createpeminjaman', this.datasiswa)
                .then(
                    ({ data }) => {
                        alert("Berhasil Tambah Peminjaman");
                        this.$router.push('/Peminjaman');
                        this.siswa = data;
                    }
                )
        },
    }
}
</script>