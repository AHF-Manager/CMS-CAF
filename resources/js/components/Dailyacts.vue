<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">



                        <div class="float-left">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-success" @click="addModal()">Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Count</th>
                                    <th>Activity</th>
                                    <th>Phase</th>
                                    <th>SR_NO</th>
                                    <th>IAEC_NO</th>
                                    <th>Details</th>
                                    <th>Short title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="dailyact in dailyacts" :key="dailyact.id">
                                    <td>{{dailyact.dct_date}}</td>
                                    <td>{{dailyact.day}}</td>
                                    <td>{{dailyact.count}}</td>
                                    <td>{{dailyact.activity}}</td>
                                    <td>{{dailyact.phase}}</td>
                                    <td>{{dailyact.sr_no}}</td>
                                    <td>{{dailyact.iaec_no}}</td>
                                    <td>{{dailyact.details}}</td>
                                    <td>{{dailyact.short_title}}</td>
                                    <td>
                                        <a href="#" @click="editModal(dailyact)">
                                            <i class="fa fa-edit orange"></i>
                                        </a>
                                        /
                                        <a href="#" @click="deleteData(dailyact.id)">
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
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
                                <input v-model="form.dct_date" type="date" name="dct_date" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('dct_date') }" placeholder="Date">
                                <has-error :form="form" field="dct_date"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.day" type="text" name="day" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('day') }" placeholder="Day">
                                <has-error :form="form" field="day"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.count" type="text" name="count" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('count') }" placeholder="Count">
                                <has-error :form="form" field="count"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.activity" type="text" name="activity" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('activity') }" placeholder="Activity">
                                <has-error :form="form" field="activity"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.phase" type="text" name="phase" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('phase') }" placeholder="phase">
                                <has-error :form="form" field="phase"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.sr_no" type="text" name="sr_no" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('sr_no') }" placeholder="SR_NO">
                                <has-error :form="form" field="sr_no"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.iaec_no" type="text" name="iaec_no" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('iaec_no') }" placeholder="IAEC_NO">
                                <has-error :form="form" field="iaec_no"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.details" type="text" name="details" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('details') }" placeholder="Details">
                                <has-error :form="form" field="details"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.short_title" type="text" name="short_title" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('short_title') }" placeholder="Short_title">
                                <has-error :form="form" field="short_title"></has-error>
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
                dailyacts: {},
                form: new Form({
                    id: '',
                    dct_date: '',
                    day: '',
                    count: '',
                    activity: '',
                    phase: '',
                    sr_no: '',
                    iaec_no: '',
                    details: '',
                    short_title: ''
                })
            }
        },
        methods: {

            //update data

            updateData() {
                // console.log('Yo its editing Data');
                this.$Progress.start();
                this.form.put('api/dailyact/' + this.form.id)
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

            editModal(dailyact) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(dailyact);
            },

            // Add dataa

            addModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
            addData() {
                this.$Progress.start();
                this.form.post('api/dailyact')
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
                        this.form.delete('api/dailyact/' + id).then(() => {

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
                axios.get('api/dailyact').then(({
                    data
                }) => (this.dailyacts = data.data));
            },

        },
        mounted() {
            this.loadData();
            Fire.$on('refreshData', () => {
                this.loadData();
            });
        }
    }
</script>