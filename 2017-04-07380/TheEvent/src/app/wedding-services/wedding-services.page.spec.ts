import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { WeddingServicesPage } from './wedding-services.page';

describe('WeddingServicesPage', () => {
  let component: WeddingServicesPage;
  let fixture: ComponentFixture<WeddingServicesPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ WeddingServicesPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(WeddingServicesPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
