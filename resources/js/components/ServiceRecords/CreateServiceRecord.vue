<template>
    <div>
        <h3 class="text-center">Create Service Record</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addServiceRecord">
                    <div class="form-group">
                        <label>Employee ID</label>
                        <input type="text" class="form-control" v-model="service_record.employee_id">
                    </div>
                    <div class="form-group">
                        <label>Date From</label>
                        <input type="date" class="form-control" v-model="service_record.date_from">
                    </div>
                    <div class="form-group">
                        <label>Date To</label>
                        <input type="date" class="form-control" v-model="service_record.date_to">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" v-model="service_record.position">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" min="5000" step="100" class="form-control" v-model="service_record.salary">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                service_record: {
                    salary: 5000
                },
            }
        },
        methods: {
            addServiceRecord() {
                this.axios
                    .post('http://localhost:8000/api/service-record', this.service_record)
                    .then(response => (
                        this.$router.push({ name: 'service-records' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },
        }
    }
</script>