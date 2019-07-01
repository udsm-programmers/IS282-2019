import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { BirthdayServicesPage } from './birthday-services.page';

const routes: Routes = [
  {
    path: '',
    component: BirthdayServicesPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [BirthdayServicesPage]
})
export class BirthdayServicesPageModule {}
