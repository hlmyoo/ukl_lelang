<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Kelas</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form @submit.prevent="edit">           
                                        <input type="hidden" v-model="id_kelas">
                                        <label for="kelas" class="form-label">Nama Kelas:</label>
                                        <input type="text" v-model="nama_kelas" class="form-control" id="k" placeholder="Masukkan judul buku.." autocomplete="off">

                                        
                                        <br>
                                        <input type="submit" value="Simpan" class="btn btn-primary">
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

// import { response } from 'express';
export default {
    
      
    data(){
        return{          
                kelas: [],
                id_kelas: '',
                nama_kelas: ''
               
        }
    },
    methods: {
        getKelas : function(){
            axios.get('http://localhost:8000/api/getkelas')
            .then(
               response => {
                this.buku = response.data
               }
            )
        },  
        getDetail(id_kelas){
           axios.get('http://localhost:8000/api/getkelas/' + id_kelas)
           .then(
            response => {
                console.log(response.data[0])
                this.id_kelas = response.data[0].id_kelas
                this.nama_kelas = response.data[0].nama_kelas
                
            });
        },
        edit: function(){
            let dataKelas = 
            {
                id_kelas : this.id_kelas,
                nama_kelas : this.nama_kelas,
                
            }
            axios.put('http://localhost:8000/api/updatekelas/' + this.id_kelas, dataKelas)
            .then(
                res => {
                    alert('sukses update kelas')
                    console.log(res)
                    this.$router.push('/kelas')
                }
            )
        }
    },
    mounted(){
        this.getKelas()
        this.getDetail(this.$route.params.id)
    }
   
}
</script>