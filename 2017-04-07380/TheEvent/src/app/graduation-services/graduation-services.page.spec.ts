import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GraduationServicesPage } from './graduation-services.page';

describe('GraduationServicesPage', () => {
  let component: GraduationServicesPage;
  let fixture: ComponentFixture<GraduationServicesPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GraduationServicesPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GraduationServicesPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
