<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <section>         
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="login-card">
                            <form class="theme-form login-form" @submit.prevent="submit">
                                <h4>Login</h4>
                                <h6>Welcome back! Log in to your account.</h6>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                        <input class="form-control" type="email" required="" placeholder="me@coinradr.com" v-model="form.email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                        <input class="form-control" type="password" name="login[password]" required="" placeholder="*********" v-model="form.password">
                                        <div class="show-hide"><span class="show">                         </span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1">Remember password</label>
                                    </div>
                                    
                                    <Link v-if="canResetPassword" :href="route('password.request')" class="link">
                                        Forgot password?
                                    </Link>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" :disabled="form.processing">Sign in</button>
                                </div>
                                <p>Don't have account?<a class="ms-2" href="log-in.html">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </BreezeGuestLayout>
</template>
