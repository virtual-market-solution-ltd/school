ALTER TABLE crm_contacts ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE crm_persons ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE currencies ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE cust_allocations ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE cust_branch ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE debtors_master ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE debtor_trans ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE debtor_trans_details ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE dimensions ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE exchange_rates ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE fiscal_year ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE gl_trans ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE grn_batch ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE grn_items ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE groups ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE item_codes ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE item_tax_types ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE item_tax_type_exemptions ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE item_units ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE locations ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE loc_stock ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE movement_types ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE payment_terms ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE prices ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE printers ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE print_profiles ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE purch_data ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE purch_orders ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE purch_order_details ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE quick_entries ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE quick_entry_lines ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE recurrent_invoices ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE refs ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE salesman ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sales_orders ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sales_order_details ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sales_pos ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sales_types ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE security_roles ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE shippers ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sql_trail ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE stock_category ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE stock_master ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE stock_moves ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE suppliers ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE supp_allocations ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE supp_invoice_items ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE supp_trans ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sys_prefs ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE sys_types ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE tags ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE tag_associations ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE tax_groups ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE tax_group_items ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE tax_types ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE trans_tax_details ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE voided ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE workcentres ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE workorders ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE wo_issues ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE wo_issue_items ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE wo_manufacture ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);
ALTER TABLE wo_requirements ADD schools_id INTEGER UNSIGNED, ADD CONSTRAINT FOREIGN KEY(schools_id) REFERENCES schools(id);