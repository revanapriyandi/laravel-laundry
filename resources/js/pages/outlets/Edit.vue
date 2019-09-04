<template>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Outlet</h3>
            </div>
            <div class="panel-body">
                <outlet-form></outlet-form>
                <div class="form-group">
                    <div class="col-md-1">
                        <button class="btn btn-primary btn-sm btn-flat" @click.prevent="submit">
                        <i class="fa fa-save"></i> Update
                    </button>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger btn-sm btn-flat" href="/outlets">
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { mapActions, mapState } from 'vuex'
    import FormOutlets from './Form.vue'
    export default {
        name: 'EditOutlet',
        created() {
            //SEBELUM COMPONENT DI-RENDER KITA MELAKUKAN REQUEST KESERVER
            //BERDASARKAN CODE YANG ADA DI URL
            this.editOutlet(this.$route.params.id)
        },
        methods: {
            ...mapActions('outlet', ['editOutlet', 'updateOutlet']),
            submit() {
                //KETIKA TOMBOL UPDATE DI MAKA AKAN MENGIRIMKAN PERMINTAAN
                //UNTUK MENGUBAH DATA BERDASARKAN CODE YANG DIKIRIMKAN
                this.updateOutlet(this.$route.params.id).then(() => {
                    //APABILA BERHASIL MAKA AKAN DI-DIRECT KEMBALI
                    //KE HALAMAN /outlets
                    this.$router.push({ name: 'outlets.data' })
                })
            }
        },
        components: {
            'outlet-form': FormOutlets
        },
    }
</script>