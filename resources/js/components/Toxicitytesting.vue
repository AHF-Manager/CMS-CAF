<template>
    <div class="container">

        <div class="row justify-column-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Bodyweight Data
                        <button class="float-right btn btn-primary btn-sm"
                            @click="outlierCalc"> <i class="fas fa-calculator"></i> Calculate</button>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="form group">
                            <label>Date</label>
                            <input type="date" v-model="bdDate" class="form-control">
                        </div>
                        <div class="mb-3"></div>

                        <table class="table table-hover p-0">
                            <thead>
                                <tr>
                                    <th>Body Weight
                                        <div class="float-right">
                                            <button class="float-right btn btn-sm btn-info" @click="addLine"><i
                                                    class="fas fa-plus"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>



                                <tr v-for="(bdweight, k) in bdweights" :key="k">

                                    <td>

                                        <div class="input-group">

                                            <input type="number" name="weight[]" id="bdweight" class="form-control"
                                                v-model="bdweight.weight" min="0" step=".01">

                                            <span class="input-group-prepend">
                                                <button @click="deleteLine(k,bdweight)"><i
                                                        class="fas fa-trash orange"></i></button>
                                            </span>
                                        </div>

                                    </td>

                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Food-Intake data

                        <button @click="addData" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> ADD</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="date" id="a" v-model="foodintake.date" class="form-control"
                                        placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="b" v-model="foodintake.animalid" class="form-control"
                                        placeholder="Animal Id">
                                </div>
                                <div class="form-group">
                                    <input type="floa" id="c" v-model="foodintake.day" class="form-control"
                                        placeholder="Day">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" :value="this.foodintake.intial" @change="subintakea" min="0"
                                        step=".01 " id="d" class="form-control" placeholder="Intial">
                                </div>
                                <div class="form-group">
                                    <input type="number" :value="this.foodintake.final" class="form-control"
                                        @change="subintakeb" min="0" step=".01" id="e" placeholder="Final">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="f" v-model="foodintake.intake" class="form-control" min="0"
                                        step=".01" placeholder="Intake">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-column-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        bodyweight view
                    </div>
                    <div class="car-body table-responsive p-0">
                        <table class="table table-bordered" id="mytables">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Mean</th>
                                    <th>Standard Deviation</th>
                                    <th>Outliers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(analysi, k) in analysis" :key="k">
                                    <td>{{analysi.date}}</td>
                                    <td>{{analysi.mean}}</td>
                                    <td>{{analysi.sd}}</td>
                                    <td>{{analysi.out}}</td>
                                    <td>
                                        <a @click="remove(analysi)"><i class="fas fa-trash orange"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button @click="removeAnaData" class="btn-sm btn btn-light"><i class="fas fa-trash red"></i>-Reset</button>
                        </div>
                        <div class="float-left">
                            <button class="btn btn-primary btn-sm" id="button-a" @click="exportExcelAD('xlsx')"><i class="fas fa-download"></i> Export</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Food-Intake veiw
                        <div class="float-right">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="search" name="search" v-model="search" class="form-control">

                            </div>
                        </div>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="row">
                            <table class="table table-bordered" id="mytable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Animal ID</th>
                                        <th>Day</th>
                                        <th>Intial</th>
                                        <th>Final</th>
                                        <th>Intake</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(fdintk,k) in filteredData" :key="k">
                                        <td>{{fdintk.date}}</td>
                                        <td>{{fdintk.animalid}}</td>
                                        <td>{{fdintk.day}}</td>
                                        <td>{{fdintk.intial}}</td>
                                        <td>{{fdintk.final}}</td>
                                        <td>{{fdintk.intake}}</td>
                                        <td>
                                            <a @click="destroy(fdintk)"><i class="fas fa-trash orange"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button @click="removeFdData" class="btn-sm btn btn-light"><i class="fas fa-trash red"></i>-Reset</button>
                        </div>
                        <div class="float-left">
                            <button id="button-a" class="btn btn-primary btn-sm"  @click="exportExcelFD('xlsx')"><i class="fas fa-download"></i> Export</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3"></div>
        <div class="row justify-column-center">
            <div class="col-md-5">

                <div class="pannel">
                    <div class="pannel-header" id="headingTwo">
                        <h5 class="mb-0">
                            
                             Mean, stDev ,Outlier Calculator.
                            
                        </h5>
                    </div>
                        <div class="pannel-body">
                            <p>Enter the values seperated by commas (or) upload xlsx file</p>
                            <textarea name="dta" id="outlierData" cols="48" rows="7"></textarea>
                        </div>
                        <div class="pannel-footer">
                            <div class="form-group">
                                <button class="btn btn-info btn-sm float-right " @click="calculateOutlier">Calculate</button>
                                <input type="file" @change="handleFile">
                            </div>
                            <span id="anso"></span>
                            <br>
                            <span id='ans'></span>
                            <br>
                            <span id='ansd'></span>

                        </div>
                </div>
        </div>
        </div>

    </div>
</template>
<script>
    export default {

        data() {
            return {
                datacollection: {},
                bdweights: [{
                    weight: '',
                    mean: 0,
                    sd: 0
                }],
                outResult: '',
                bdDate: '',
                search: '',
                attachment: '',
                analysis: [],
                fdintks: [],
                outlier: [],
                foodintake: {
                    date: '',
                    day: '',
                    animalid: '',
                    intial: '',
                    final: '',
                    intake: ''
                },
                savebtn: true,
                updatebtn: false,

            }
        },
        methods: {
            subintakea(event) {
                this.foodintake.intial = event.target.value;
                let tota = parseFloat(this.foodintake.intial) - parseFloat(this.foodintake.final);
                this.foodintake.intake = tota.toFixed(2);
            },

            subintakeb(event) {
                this.foodintake.final = event.target.value;
                let tot = parseFloat(this.foodintake.intial) - parseFloat(this.foodintake.final);
                this.foodintake.intake = tot.toFixed(2);
            },
            calculateOutlier() {
                let Outdata = document.getElementById('outlierData').value
                if (Outdata === '') {
                    swal.fire(
                        'Error',
                        'please enter some values.',
                        'error'
                    )
                } else {
                    let b = Outdata.split(',').map(Number);
                    // console.log(b);
                    let answer = grubbs.test(b);
                    let fAns = answer.map(element => {
                        return parseFloat(element.outliers);
                    });
                    let index = -1;
                    const arr_length = fAns ? fAns.length : 0;
                    let resIndex = -1;
                    const result = [];

                    while (++index < arr_length) {
                        const value = fAns[index];

                        if (value) {
                            result[++resIndex] = value;
                        }
                    }
                    if (result.length > 0) {
                        document.getElementById('anso').innerHTML = 'Outliers: ' + result;
                    } else {
                        document.getElementById('anso').innerHTML = 'Outliers: None';

                    }



                    let ba = Outdata.split(',').map(Number);
                    // console.log(b);
                    var subtotal;
                    var avglg = ba.length;
                    subtotal = ba.reduce(function (sum, product) {
                        var lineTotal = parseFloat(product);
                        if (!isNaN(lineTotal)) {
                            var avg = sum + lineTotal;
                            return avg;
                        }
                    }, 0);
                    var means = (subtotal / avglg).toFixed(2);
                    const s = Math.sqrt(ba.map(x => Math.pow(x - means, 2)).reduce((a, b) => a + b, 0) / avglg)
                        document.getElementById('ans').innerHTML = 'Mean: ' + means;
                        document.getElementById('ansd').innerHTML = 'stDev: ' + s.toFixed(2);


                }


                // return result;

                // let popped = fAns.splice(-1,1);
                // console.log(result);
                // let c = b.map(item => parseInt(item,10));
                // console.log(parseInt(c));
            },
            
            removeAnaData() {
                swal.fire({
                    title: 'Do you wanna delete Entire Data?',
                    text: "Export the data before Reseting the table",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        localStorage.removeItem('anaData');
                        this.analysis.splice(0, this.analysis.length)
                        swal.fire(
                            'Deleted!',
                            'Datastorage has been deleted.',
                            'success'
                        )
                        this.localData();
                    }
                })
                // localStorage.setItem('anaData', JSON.stringify(this.analysis))

            },
            removeFdData() {
                swal.fire({
                    title: 'Do you wanna delete Entire Data?',
                    text: "Export the data before Reseting the table",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete.value) {
                        localStorage.removeItem('foodin');
                        this.fdintks.splice(0, this.fdintks.length)
                        swal.fire(
                            'Deleted!',
                            'Data storage has been deleted.',
                            'success'
                        )
                        this.localData();
                    } else {

                    }
                })
            },
            handleFile(e) {
                var files = e.target.files,
                    f = files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {
                        type: 'array'
                    });
                    // console.log(workbook);  
                    /* DO SOMETHING WITH workbook HERE */
                    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    var container = document.getElementById('outlierData');
                    container.innerHTML = XLSX.utils.sheet_to_csv(worksheet);
                };
                reader.readAsArrayBuffer(f);
            },
            handleFileMSD(e) {
                var files = e.target.files,
                    f = files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {
                        type: 'array'
                    });
                    // console.log(workbook);  
                    /* DO SOMETHING WITH workbook HERE */
                    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    var container = document.getElementById('msdData');
                    container.innerHTML = XLSX.utils.sheet_to_csv(worksheet);
                };
                reader.readAsArrayBuffer(f);
            },
            exportExcelFD(type, fn, dl) {
                
                var elt = document.getElementById('mytable');
                 var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
                return dl ?
                XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
                    XLSX.writeFile(wb, fn || ('Foodintakes.' + (type || 'xlsx')));

                
            },
            exportExcelAD(type, fn, dl) {
                
                var elt = document.getElementById('mytables');
                 var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
                return dl ?
                XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
                    XLSX.writeFile(wb, fn || ('bodyweight.' + (type || 'xlsx')));

                
            },
            addData() {
                let aid, dt, da, inl, fnl, intk;
                aid = this.foodintake.animalid;
                dt = this.foodintake.date;
                da = this.foodintake.day;
                inl = this.foodintake.intial
                fnl = this.foodintake.final
                intk = this.foodintake.intake
                if (aid === '' || dt === '' || inl === '' || fnl === '' || da === '') {
                    swal.fire(
                        'Error',
                        'please fill all the feilds.',
                        'error'
                    )
                } else {
                    this.fdintks.push({
                        date: dt,
                        day: da,
                        animalid: aid,
                        intial: inl,
                        final: fnl,
                        intake: intk
                    })
                    this.clearData();
                    this.localData();
                    toast.fire({
                        icon: 'success',
                        title: 'Data added successfuly'
                    })
                }

            },
            addLine() {
                this.bdweights.push({
                    weight: ''
                })
            },
            deleteLine(index, bdweight) {
                var idx = this.bdweights.indexOf(bdweight);
                if (idx > -1) {
                    this.bdweights.splice(idx, 1);
                }
            },
            addNewRow() {
                let Dte, Day, Amd, Sex, Bdt
                Dte = this.bodywtDatas.dt;
                Day = this.bodywtDatas.day;
                Amd = this.bodywtDatas.amlid;
                Sex = this.bodywtDatas.sex;
                Bdt = this.bodywtDatas.bdt;


                if (Dte === '' || Day === '' || Amd === '' || Sex === '' || Bdt === '') {
                    swal.fire(
                        'Error',
                        'please enter the body Weight.',
                        'error'
                    )
                } else {
                    this.bodywts.push({
                        dt: Dte,
                        amlID: Day,
                        sex: Amd,
                        bodywt: Sex,
                        day: Bdt
                    });


                }
            },
            
            pushdata() {
                let nv, mv, dv, ov;
                ov = this.outResult;
                dv = this.bdDate;
                nv = this.bdweights.sd;
                mv = this.bdweights.mean;
                this.analysis.push({
                    mean: mv,
                    sd: nv,
                    date: dv,
                    out: ov
                });
                this.localData();
                toast.fire({
                    icon: 'success',
                    title: 'Done!'
                })
            },
            clearData() {
                this.savebtn = true;
                this.updatebtn = false;
                this.foodintake.animalid = ''
                this.foodintake.date = ''
                this.foodintake.day = ''
                this.foodintake.intial = ''
                this.foodintake.final = ''
                this.foodintake.intake = ''
            },
            destroy(fdintk) {
                var del = this.fdintks.indexOf(fdintk);
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((isConfirm) => {
                    if (isConfirm.value) {
                        this.fdintks.splice(del, 1)
                        toast.fire({
                            icon: 'success',
                            title: 'Data removed successfuly'
                        })
                        this.localData();

                        // this.localData();
                    }
                }).catch(() => {
                    swal('Failed', 'Something Went Teeribly Wrong');
                });
            },
            outlierCalc() {
                let val = document.getElementById('bdweight').value;
                if(val === ''){
                    swal.fire(
                        'Error',
                        'please enter the body Weight.',
                        'error'
                    )
                }else{

                
                let ad = this.bdweights.map(element => {
                    return parseFloat(element.weight);
                });
                var result = grubbs.test(ad);
                let bd = result.map(element => {
                    return parseFloat(element.outliers);
                });
                let inde = -1;
                const arr_lengt = bd ? bd.length : 0;
                let resInde = -1;
                const resul = [];

                while (++inde < arr_lengt) {
                    const valu = bd[inde];

                    if (valu) {
                        resul[++resInde] = valu;
                    }
                }
                if (resul.length > 0) {
                    this.outResult = resul;
                } else {
                    this.outResult = 'None';
                }
                // calculate Mean

                var subtotal;
                var avglg = this.bdweights.length;
                subtotal = this.bdweights.reduce(function (sum, product) {
                    var lineTotal = parseFloat(product.weight);
                    if (!isNaN(lineTotal)) {
                        var avg = sum + lineTotal;
                        return avg;
                    }
                }, 0);
                var means = (subtotal / avglg).toFixed(2);
                this.bdweights.mean = means;

                //calculate stDev

                const n = this.bdweights.length;
                let me = this.bdweights.reduce((a, b) => {
                    let metot = parseFloat(b.weight);
                    if (!isNaN(metot)) {
                        let mee = a + metot;
                        return mee;
                    }
                }, 0) / n;
                const s = Math.sqrt(this.bdweights.map(x => Math.pow(x.weight - me, 2)).reduce((a, b) => a + b, 0) / n);
                this.bdweights.sd = s.toFixed(2);
                let nv;
                nv = this.bdweights.sd;

                this.pushdata();
                }
                
                
           },
            remove(analysi) {
                let rem = this.analysis.indexOf(analysi);
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((wontDelete) => {
                    if (wontDelete.value) {
                        this.analysis.splice(rem, 1)
                        toast.fire({
                            icon: 'success',
                            title: 'Data removed successfuly'
                        })
                        this.localData();
                    } else {

                    }
                })

            },
            localData() {
                let parsed = JSON.stringify(this.fdintks);
                let parse = JSON.stringify(this.analysis);
                localStorage.setItem('anaData', parse)
                localStorage.setItem('foodin', parsed)
            },



        },
        created() {
            // this.localData();
            this.fdintks = JSON.parse(localStorage.getItem('foodin'));
            this.analysis = JSON.parse(localStorage.getItem('anaData'));


        },
        computed: {
            filteredData() {
                return this.fdintks.filter((fdintk) => {
                    return fdintk.day.match(this.search)
                });
            },
        },


    }

</script>
