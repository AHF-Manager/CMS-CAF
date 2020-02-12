<template>
    <div class="container col-md-12">
        <div class="row " v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">
                            <h4>Stock Register</h4>
                        </div>

                        <div class="card-tools">
                            <button class="btn btn-success" @click="addModal()"><i class="fas fa-plus "
                                    aria-hidden="true"></i>&nbsp;Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th rowspan="2" >Species</th>
                                    <th rowspan="2" >Registered_Date</th>
                                    <th colspan="3">Opening Balance</th>
                                    <th colspan="2">Receipt</th>
                                    <th colspan="2">Issue</th>
                                    <th colspan="2">Mortality</th>
                                    <th colspan="3">Closing balance</th>
                                    <th rowspan="2">Remarks</th>
                                    <th rowspan="2" width="125">Action</th>
                                </tr>
                                <tr>

                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="stock in stocks.data" :key="stock.id">
                                    <td>{{stock.species}}</td>
                                    <td>{{stock.st_date}}</td>
                                    <td>{{stock.ob_m   }}</td>
                                    <td>{{stock.ob_f   }}</td>
                                    <td>{{stock.ob_t   }}</td>
                                    <td>{{stock.re_m   }}</td>
                                    <td>{{stock.re_f   }}</td>
                                    <td>{{stock.is_m   }}</td>
                                    <td>{{stock.is_f   }}</td>
                                    <td>{{stock.mt_m   }}</td>
                                    <td>{{stock.mt_f   }}</td>
                                    <td>{{stock.cb_m   }}</td>
                                    <td>{{stock.cb_f   }}</td>
                                    <td>{{stock.cb_t   }}</td>
                                    <td>{{stock.remarks}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-light" @click="editModal(stock)">
                                            <i class="fa fa-edit orange"></i>
                                        </button>
                                        
                                        <button class="btn btn-sm btn-light" @click="deleteData(stock.id)">
                                            <i class="fa fa-trash red"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm" id="button-a" @click="exportExcel('xlsx')"><i class="fas fa-download"></i> Export</button>
                        </div>
                        <pagination :data="stocks" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Data</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateData() : addData()">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <select v-model="form.species"  name="species"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('species') }"
                                                    >
                                                    <option value="" disabled selected>Species</option>
                                                    <option v-for="(spec,k) in specs" :key="k">{{spec}}</option>
                                                    </select>

                                                <has-error :form="form" field="species"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="form.st_date" type="text" onfocus="(this.type='date')" name="st_date"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('st_date') }"
                                                    placeholder="Date">
                                                <has-error :form="form" field="st_date"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Opening Balance</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input :value="this.form.ob_m" @change="addOBm" type="number" name="ob_m"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('ob_m') }"
                                                    placeholder="Opening Balance male">
                                                <has-error :form="form" field="ob_m"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input :value="this.form.ob_f" @change="addOBf" type="number" name="ob_f"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('ob_f') }"
                                                    placeholder="Opening Balance Female">
                                                <has-error :form="form" field="ob_f"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="form.ob_t" type="number" name="ob_t"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('ob_t') }"
                                                    placeholder="Total">
                                                <has-error :form="form" field="ob_t"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Closing Balance</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input :value="this.form.cb_m" @change="addCBm" type="number" name="cb_m"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('cb_m') }"
                                                    placeholder="Closing balance Male">
                                                <has-error :form="form" field="cb_m"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input :value="this.form.cb_f" @change="addCBf" type="number" name="cb_f"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('cb_f') }"
                                                    placeholder="Closing balance Female">
                                                <has-error :form="form" field="cb_f"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="form.cb_t" type="number" name="cb_t"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('cb_t') }"
                                                    placeholder="Total">
                                                <has-error :form="form" field="cb_t"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Receipt
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                        <input v-model="form.re_m" type="number" name="re_m" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('re_m') }"
                                            placeholder="Reciept Male">
                                        <has-error :form="form" field="re_m"></has-error>
                                            </div>
                                            <div class="form-group">
                                        <input v-model="form.re_f" type="number" name="re_f" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('re_f') }"
                                            placeholder="Receipt Female">
                                        <has-error :form="form" field="re_f"></has-error>
                                            </div>
                                            </div>
                                        </div>
                                            
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Issue
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                        <input v-model="form.is_m" type="number" name="is_m" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('is_m') }" placeholder="Issue Male">
                                        <has-error :form="form" field="is_m"></has-error>
                                            </div>
                                            <div class="form-group">
                                        <input v-model="form.is_f" type="number" name="is_f" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('is_f') }"
                                            placeholder="Issue Female">
                                        <has-error :form="form" field="is_f"></has-error>
                                            </div>
                                            </div>
                                        </div>
                                            
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">Mortality</div>
                                            <div class="card-body">
                                                 <div class="form-group">
                                        <input v-model="form.mt_m" type="number" name="mt_m" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('mt_m') }"
                                            placeholder="Mortality Male">
                                        <has-error :form="form" field="mt_m"></has-error>
                                            </div>
                                            <div class="form-group">
                                        <input v-model="form.mt_f" type="number" name="mt_f" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('mt_f') }"
                                            placeholder="Mortality Male">
                                        <has-error :form="form" field="mt_f"></has-error>
                                            </div>
                                            </div>
                                        </div>
                                           
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                <input v-model="form.remarks" type="text" name="remarks"
                                                    class="form-control"
                                                    :class="{ 'is-invalid': form.errors.has('remarks') }"
                                                    placeholder="Remarks">
                                                <has-error :form="form" field="remarks"></has-error>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                                <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {

            return {
                editmode: false,
                stocks: {},
                specs:['Rat','Mouse','Guinea  pig'],
                form: new Form({
                    id: '',
                    species: '',
                    st_date: '',
                    ob_m: '',
                    ob_f: '',
                    ob_t: '',
                    re_m: '',
                    re_f: '',
                    is_m: '',
                    is_f: '',
                    mt_m: '',
                    mt_f: '',
                    cb_m: '',
                    cb_f: '',
                    cb_t: '',
                    remarks: '',
                })
            }
        },
        methods: {

            //update data
            getResults(page = 1) {
                axios.get('api/stock?page=' + page)
                    .then(response => {
                        this.stocks = response.data;
                    });
            },
            addOBm(event){
                this.form.ob_m = event.target.value;
                this.form.ob_t = parseInt(this.form.ob_m)  + parseInt(this.form.ob_f);
            },
            exportExcel(type, fn, dl){
                 var elt = document.getElementById('mytable');
                 var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
                return dl ?
                XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
                    XLSX.writeFile(wb, fn || ('stock.' + (type || 'xlsx')));
            },
            addOBf(event){
                this.form.ob_f = event.target.value;
                this.form.ob_t = parseInt(this.form.ob_m)  + parseInt(this.form.ob_f);
            },
            addCBm(event){
                this.form.cb_m = event.target.value;
                this.form.cb_t = parseInt(this.form.cb_m)  + parseInt(this.form.cb_f);
            },
            addCBf(event){
                this.form.cb_f = event.target.value;
                this.form.cb_t = parseInt(this.form.cb_m)  + parseInt(this.form.cb_f);
            },
            updateData() {
                // console.log('Yo its editing Data');
                this.$Progress.start();
                this.form.put('api/stock/' + this.form.id)
                    .then(() => {
                        $('#addNew').modal('hide');
                        swal.fire(
                            'Updated!',
                            'Your file has been Updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('refreshData');
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },
            editModal(stock) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(stock);
            },
            // Add dataa
            addModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            addData() {
                this.$Progress.start();
                this.form.post('api/stock')
                    .then(() => {
                        Fire.$emit('refreshData');
                        $('#addNew').modal('hide')
                        toast.fire({
                            icon: 'success',
                            title: 'Data added successfuly'
                        })
                        this.$Progress.finish();
                    })
                    .catch(() => {

                    })
            },
            deleteData(id) {
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('api/stock/' + id).then(() => {

                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('refreshData');

                        }).catch(() => {
                            swal('Failed', 'Something Went Teeribly Wrong');
                        });
                    }
                })
            },
            loadData() {
                if (this.$gate.isAdmin()) {
                    axios.get('api/stock')
                        .then(({
                            data
                        }) => (this.stocks = data));
                }

            },

        },
        created() {
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findSTdata?q=' + query)
                    .then((data) => {
                        this.stocks = data.data
                    })
                    .catch(() => {
                         swal.fire(
                                'Oops',
                                'Nothing found.',
                                'error'
                            )
                    })
            })
            this.loadData();
            Fire.$on('refreshData', () => {
                this.loadData();
            });
        }
    }
</script>