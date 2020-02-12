<template>
    <div class="container col-md-12">
        <div class="row" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">
                            <h4>Animal Details Table</h4>
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
                                    <th scope="col">Animal ID</th>
                                    <th scope="col">SR_NO</th>
                                    <th scope="col">Date_of_birth</th>
                                    <th scope="col">Group ID</th>
                                    <th scope="col">Group Name</th>
                                    <th scope="col">Death details</th>
                                    <th scope="col">Treatment Details</th>
                                    <th scope="col">Organs For hp</th>
                                    <th scope="col">Blood Collection</th>
                                    <th scope="col">Total Animal</th>
                                    <th scope="col">Total Groups</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="animalinfo in animalinfos.data" :key="animalinfo.id">
                                    <td>{{animalinfo.animal_id        }}</td>
                                    <td>{{animalinfo.sr_no            }}</td>
                                    <td>{{animalinfo.ai_date          }}</td>
                                    <td>{{animalinfo.group_id         }}</td>
                                    <td>{{animalinfo.group_name       }}</td>
                                    <td>{{animalinfo.death_details    }}</td>
                                    <td>{{animalinfo.treatment_details}}</td>
                                    <td>{{animalinfo.organs_hp        }}</td>
                                    <td>{{animalinfo.blood_collection }}</td>
                                    <td>{{animalinfo.total_animals    }}</td>
                                    <td>{{animalinfo.total_groups     }}</td>
                                    <td>{{animalinfo.remarks          }}</td>



                                    <td>
                                        <button class="btn btn-sm btn-light" @click="editModal(animalinfo)">
                                            <i class="fa fa-edit orange"></i>
                                        </button>
                                        
                                        <button class="btn btn-sm btn-light" @click="deleteData(animalinfo.id)">
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
                        <pagination :data="animalinfos" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        Export data to Excel Format
                        <button type="button" @click="downloadData()" class="btn btn-primary btn-sm float-right"><i
                                class="fa fa-download" aria-hidden="true"></i>&nbsp; Download</button>
                    </div> -->
                    <div class="card-body">
                        <p>Choose Excel file to import into Database</p>

                        <div class="input-group">
                            <input type="file" name="import_file" @change="fieldchange">
                            <span class="input-group-prepend">
                                <button type="button" @click="uploadfile" class="btn btn-success btn-sm "><i
                                        class="fa fa-upload " aria-hidden="true"></i>&nbsp; Upload</button>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
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
                                <input v-model="form.animal_id" type="text" name="animal_id" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('animal_id') }" placeholder="Animal Id">
                                <has-error :form="form" field="animal_id"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.sr_no" type="text" name="sr_no" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('sr_no') }" placeholder="Sr_no">
                                <has-error :form="form" field="sr_no"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.ai_date" type="text" onfocus="(this.type='date')" name="ai_date" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('ai_date') }" placeholder="Animal date">
                                <has-error :form="form" field="ai_date"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.group_id" type="text" name="group_id" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('group_id') }" placeholder="Group_id">
                                <has-error :form="form" field="group_id"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.group_name" type="text" name="group_name" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('group_name') }" placeholder="Group_name">
                                <has-error :form="form" field="group_name"></has-error>
                            </div>
                            <div class="form-group">
                                <select v-model="form.death_details"  name="death_details"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('death_details') }"
                                    placeholder="death_details">
                                    <option value="" disabled selected>Death Details</option>

                                    <option v-for="(deaddet,k) in deaddets" :key ="k">{{deaddet}}</option>
                                    </select>
                                <has-error :form="form" field="death_details"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.treatment_details" type="text" name="treatment_details"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('treatment_details') }"
                                    placeholder="Treatment_details">
                                <has-error :form="form" field="treatment_details"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.organs_hp" type="text" name="organs_hp" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('organs_hp') }" placeholder="Details">
                                <has-error :form="form" field="organs_hp"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.blood_collection" type="text" name="blood_collection"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('blood_collection') }"
                                    placeholder="Blood_collection">
                                <has-error :form="form" field="blood_collection"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.total_animals" type="text" name="total_animals"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('total_animals') }"
                                    placeholder="Total_animals">
                                <has-error :form="form" field="total_animals"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.total_groups" type="text" name="total_groups" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('total_groups') }"
                                    placeholder="Total_groups">
                                <has-error :form="form" field="total_groups"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.remarks" type="text" name="remarks" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('remarks') }" placeholder="Remarks">
                                <has-error :form="form" field="remarks"></has-error>
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
                animalinfos: {},
                attachment: null,
                deaddets:['Sacrifice' ,'died'],
                forms: new FormData,
                form: new Form({
                    id: '',
                    animal_id: '',
                    sr_no: '',
                    ai_date: '',
                    group_id: '',
                    group_name: '',
                    death_details: '',
                    treatment_details: '',
                    organs_hp: '',
                    blood_collect: '',
                    total_animals: '',
                    total_groups: '',
                    remarks: '',
                })
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('api/animalinfo?page=' + page)
                    .then(response => {
                        this.animalinfos = response.data;
                    });
            },
            fieldchange(e) {

                let selectedfile = e.target.files[0];
                this.attachment = selectedfile;
                // console.log(e);
            },
            uploadfile() {
                this.forms.append('pic', this.attachment);
                const config = {
                    headers: {
                        'Content-Type': 'multipart/formdata'
                    }
                };
                axios.post('api/animport', this.forms, config)
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
            updateData() {
                // console.log('Yo its editing Data');
                this.$Progress.start();
                this.form.put('api/animalinfo/' + this.form.id)
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
            editModal(animalinfo) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(animalinfo);
            },
            addModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            addData() {
                this.$Progress.start();
                this.form.post('api/animalinfo')
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
            exportExcel(type, fn, dl){
                 var elt = document.getElementById('mytable');
                 var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
                return dl ?
                XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
                    XLSX.writeFile(wb, fn || ('animaldetails.' + (type || 'xlsx')));
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
                        this.form.delete('api/animalinfo/' + id).then(() => {

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
                axios.get('api/animalinfo')
                    .then(({
                        data
                    }) => (this.animalinfos = data));
            },
        },
        created() {
                Fire.$on('searching', () => {
                    let query = this.$parent.search;
                    axios.get('api/findANdata?q=' + query)
                        .then((data) => {
                            this.animalinfos = data.data
                        })
                        .catch(() => {

                        })
                })
                this.loadData();
                Fire.$on('refreshData', () => {
                    this.loadData();
                });
            }

    }
</script>