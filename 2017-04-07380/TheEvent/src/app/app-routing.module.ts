import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', loadChildren: './tabs/tabs.module#TabsPageModule' },
  { path: 'wedding-services', loadChildren: './wedding-services/wedding-services.module#WeddingServicesPageModule' },
  { path: 'graduation-services', loadChildren: './graduation-services/graduation-services.module#GraduationServicesPageModule' },
  { path: 'birthday-services', loadChildren: './birthday-services/birthday-services.module#BirthdayServicesPageModule' }
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
