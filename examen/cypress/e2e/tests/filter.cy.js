describe('Use filter to filter tasks', () => {
    it('User filters all tasks', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('all');
        cy.contains('button', 'Filter').click();
    })
    it('User filters own tasks', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('own');
        cy.contains('button', 'Filter').click();
    })
})
