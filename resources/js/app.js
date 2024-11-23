import './bootstrap';
import Alpine from 'alpinejs';
import bandForm from './components/bandForm';
import { drawer } from './components/drawer';
import loginModal from './components/loginModal';

window.Alpine = Alpine;

Alpine.data('bandForm', bandForm);
Alpine.data('drawer', drawer);
Alpine.data('loginModal', loginModal);

Alpine.start();
