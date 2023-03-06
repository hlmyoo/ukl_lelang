<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Buku</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form @submit.prevent="edit">           
                                        <input type="hidden" v-model="id_buku">
                                        <label for="buku" class="form-label">Judul Buku:</label>
                                        <input type="text" v-model="judul_buku" class="form-control" id="buku" placeholder="Masukkan judul buku.." autocomplete="off">

                                        <label for="pengarang" class="form-label">Pengarang</label>
                                        <input type="text" v-model="pengarang" class="form-control" id="pengarang" placeholder="Masukkan nama pengarang" autocomplete="off">
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
                buku: [],
                id_buku: '',
                judul_buku: '',
                pengarang: '',
        }
    },
    methods: {
        getBuku : function(){
            axios.get('http://localhost:8000/api/getbuku')
            .then(
               response => {
                this.buku = response.data
               }
            )
        },  
        getDetail(id_buku){
           axios.get('http://localhost:8000/api/getbuku/' + id_buku)
           .then(
            response => {
                console.log(response.data[0])
                this.id_buku = response.data[0].id_buku
                this.judul_buku = response.data[0].judul_buku
                this.pengarang = response.data[0].pengarang
            });
        },
        edit: function(){
            let dataBuku = 
            {
                id_buku : this.id_buku,
                judul_buku : this.judul_buku,
                pengarang: this.pengarang,
            }
            axios.put('http://localhost:8000/api/updatebuku/' + this.id_buku, dataBuku)
            .then(
                res => {
                    alert('sukses update buku')
                    console.log(res)
                    this.$router.push('/buku')
                }
            )
        }
    },
    mounted(){
        this.getBuku()
        this.getDetail(this.$route.params.id)
    }
   
}
</script>