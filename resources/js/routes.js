import AllEmployees from './components/employee/AllEmployees.vue';
import CreateEmployee from './components/employee/CreateEmployee.vue';
import EditEmployee from './components/employee/EditEmployee.vue';
import AllServiceRecords from './components/ServiceRecords/AllServiceRecords.vue';
import CreateServiceRecord from './components/ServiceRecords/CreateServiceRecord.vue';
import EditServiceRecord from './components/ServiceRecords/EditServiceRecord.vue';
 
export const routes = [
    {
        name: 'dashboard',
        path: '/dashboard/employee/list',
        component: AllEmployees
    },
    {
        name: 'create-employee',
        path: '/dashboard/employee/create',
        component: CreateEmployee
    },
    {
        name: 'edit-employee',
        path: '/dashboard/employee/edit/:id',
        component: EditEmployee
    },
    {
        name: 'service-records',
        path: '/dashboard/service-records/list',
        component: AllServiceRecords
    },
    {
        name: 'create-service-record',
        path: '/dashboard/service-records/create',
        component: CreateServiceRecord
    },
    {
        name: 'edit-service-record',
        path: '/dashboard/service-records/edit/:id',
        component: EditServiceRecord
    }
];