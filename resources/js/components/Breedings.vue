<template>
    <div class="container col-xl-12">
        <!-- Check whether the person is authenticated or Not with v-if $gate is imported globAly from app.js and the 
        file Gate.js is Created for Authentication  -->
        <div class="row" v-if="$gate.isAdmin()">
            <div class="col-xl-12">
                <!-- Card -->
                <div class="card p-0">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Breeding Details</h4>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="addModal()"><i class="fas fa-plus"
                                    aria-hidden="true"></i>&nbsp;Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Date_of_cohabitation</th>
                                    <th scope="col">Sire #</th>
                                    <th scope="col">Dam #</th>
                                    <th scope="col">Date_of_Seperation</th>
                                    <th scope="col">Date_of_Delivery</th>
                                    <th scope="col">LITTER male</th>
                                    <th scope="col">LITTER female</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date_of_Weaning</th>
                                    <th scope="col">Pup Male</th>
                                    <th scope="col">pup female</th>
                                    <th scope="col">Mortality male</th>
                                    <th scope="col">Mortality female</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="breeding in breedings.data" :key="breeding.id">
                                    <td>{{breeding.breed}}</td>
                                    <td>{{breeding.start}}</td>
                                    <td>{{breeding.male_id}}</td>
                                    <td>{{breeding.female_id}}</td>
                                    <td>{{breeding.seperate}}</td>
                                    <td>{{breeding.delivery}}</td>
                                    <td>{{breeding.del_male}}</td>
                                    <td>{{breeding.del_female}}</td>
                                    <td>{{breeding.tot}}</td>
                                    <td>{{breeding.weaning}}</td>
                                    <td>{{breeding.pup_male}}</td>
                                    <td>{{breeding.pup_female}}</td>
                                    <td>{{breeding.m_male}}</td>
                                    <td>{{breeding.m_female}}</td>
                                    <td>{{breeding.total}}</td>




                                    <td>
                                        <button class="btn btn-sm btn-light" @click="editModal(breeding)">
                                            <i class="fa fa-edit orange"></i>
                                        </button>
                                        
                                        <button class="btn btn-sm btn-light" @click="deleteData(breeding.id)">
                                            <i class="fa fa-trash red"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="breedings" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- File Upload -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>Choose Excel file to import into Database</p>
                        <div class="input-group">
                            <input type="file" name="import_file" @change="fieldchange">
                            <span class="input-group-prepend">
                                <button type="button" @click="uploadfile" class="btn btn-success btn-sm "><i
                                        class="fa fa-upload" aria-hidden="true"></i>&nbsp; Upload</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /fileupload -->
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
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
                            <div class="form-group">
                                <select v-model="form.breed"  name="breed" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('breed') }">
                                <option value="" disabled selected>Species</option>

                                <option v-for="(spec,k) in specs" :key="k">{{spec}}</option>

                                </select>
                                <has-error :form="form" field="breed"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.start" type="date" @change="addDate" name="start"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('start') }"
                                    placeholder="start">
                                <has-error :form="form" field="start"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.male_id" type="text" name="male_id" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('male_id') }" placeholder="male_id">
                                <has-error :form="form" field="male_id"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.female_id" type="text" name="female_id" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('female_id') }" placeholder="female_id">
                                <has-error :form="form" field="female_id"></has-error>
                            </div>
                            <div class="form-group">
                                <input :value="this.form.seperate" type="text" name="seperate" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('seperate') }" placeholder="seperate">
                                <has-error :form="form" field="seperate"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.delivery" type="date" name="delivery" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('delivery') }" placeholder="delivery">
                                <has-error :form="form" field="delivery"></has-error>
                            </div>
                            <div class="form-group">
                                <input :value="this.form.del_male" @change="addNuma" type="number" name="del_male"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('del_male') }"
                                    placeholder="del_male">
                                <has-error :form="form" field="del_male"></has-error>
                            </div>
                            <div class="form-group">
                                <input :value="this.form.del_female" @change="addNumb" type="number" name="del_female"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('del_female') }"
                                    placeholder="del_female">
                                <has-error :form="form" field="del_female"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.tot" type="text" name="tot" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('tot') }" placeholder="Details">
                                <has-error :form="form" field="tot"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.weaning" type="date" name="weaning" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('weaning') }" placeholder="weaning">
                                <has-error :form="form" field="weaning"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.pup_male" type="text" name="pup_male" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('pup_male') }" placeholder="pup_male">
                                <has-error :form="form" field="pup_male"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.pup_female" type="text" name="pup_female" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('pup_female') }" placeholder="pup_female">
                                <has-error :form="form" field="pup_female"></has-error>
                            </div>
                            <div class="form-group">
                                <input :value="this.form.m_male" type="number" @change="subNuma" name="m_male"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('m_male') }"
                                    placeholder="m_male">
                                <has-error :form="form" field="m_male"></has-error>
                            </div>
                            <div class="form-group">
                                <input :value="this.form.m_female" type="number" @change="subNumb" name="m_female"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('m_female') }"
                                    placeholder="m_female">
                                <has-error :form="form" field="m_female"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.total" type="number" name="total" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('total') }" placeholder="total">
                                <has-error :form="form" field="total"></has-error>
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
        <!-- /row -->
    </div>
</template>
<script>
    export default {
        data() {
            return {
                editmode: false,
                breedings: {},
                attachment: null,
                specs:['Rat','Mice','Ginny pig'],
                forms: new FormData,
                form: new Form({
                    id: '',
                    breed: '',
                    start: '',
                    male_id: '',
                    female_id: '',
                    seperate: '',
                    delivery: '',
                    del_male: '',
                    del_female: '',
                    tot: '',
                    weaning: '',
                    pup_male: '',
                    pup_female: '',
                    m_male: '',
                    m_female: '',
                    total: ''
                })
            }
        },
        methods: {
            //Pagination Function
            getResults(page = 1) {
                axios.get('api/breeding?page=' + page)
                    .then(response => {
                        this.breedings = response.data;
                    });
            },
            //get the file
            fieldchange(e) {
                let selectedfile = e.target.files[0];
                this.attachment = selectedfile;
            },
            //add two Date
            addNuma(event) {
                this.form.del_male = event.target.value;
                this.form.total = parseInt(this.form.del_male) + parseInt(this.form.del_female);
            },
            addNumb(event) {
                this.form.del_female = event.target.value;
                this.form.total = parseInt(this.form.del_male) + parseInt(this.form.del_female);

            },
            subNuma(event) {
                this.form.m_male = event.target.value;
                this.form.total -= parseInt(this.form.m_male);
            },
            subNumb(event) {
                this.form.m_female = event.target.value;
                this.form.total -= parseInt(this.form.m_female);
            },
            addDate(event) {
                let date, sumDate, finalDate, parts;
                date = new Date(event.target.value);
                date.setDate(date.getDate() + 10);
                // finalDate = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
                finalDate = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
                // parts = sumDate.split('-');
                // this.form.seperate =new Date.(this.form.start) + 10;
                // console.log( typeof(finalDate) );
                this.form.seperate = finalDate;
                // finalDate = new Date(sumDate); 
                // console.log(finalDate);

            },
            //upload file
            uploadfile() {
                this.forms.append('pic', this.attachment);
                const config = {
                    headers: {
                        'Content-Type': 'multipart/formdata'
                    }
                };
                axios.post('api/breedimport', this.forms, config)
                    .then(response => {
                        Fire.$emit('refreshData');
                        swal.fire(
                            'uploaded',
                            'Your file has been uploaded.',
                            'success'
                        )
                    })
                    .catch(response => {
                        swal.fire(
                            'Error',
                            'please choose appropriate file for uploading.',
                            'error'
                        )
                    })
            },
            // update the existing the data
            updateData() {
                this.$Progress.start();
                this.form.put('api/breeding/' + this.form.id)
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
                        swal.fire(
                            'Failed!',
                            'Your file has been Updated.',
                            'error'
                        )
                        this.$Progress.fail();
                    });
            },
            // edit the Existing Data
            editModal(breeding) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(breeding);
            },
            //open new Model
            addModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            // add new Data
            addData() {
                this.$Progress.start();
                this.form.post('api/breeding')
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
                        toast.fire({
                            icon: 'error',
                            title: 'Please Enter proper Input'
                        })
                    })

            },
            // delete the data 
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
                        this.form.delete('api/breeding/' + id).then(() => {
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
            //load the Data
            loadData() {
                if (this.$gate.isAdmin()) {
                    axios.get('api/breeding')
                        .then(({
                            data
                        }) => (this.breedings = data));
                }
            },
            // Searching and load data Function

        },
        created() {
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findBGdata?q=' + query)
                    .then((data) => {
                        this.breedings = data.data
                    })
                    .catch(() => {

                    })
            })
            this.loadData();
            Fire.$on('refreshData', () => {
                this.loadData();
            });
        },

    }
</script>