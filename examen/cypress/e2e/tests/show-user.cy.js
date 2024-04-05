it('Administrator looks at user details', () => {
    cy.visit('http://127.0.0.1:8000/')
    cy.get('input[type="email"]').type('admin@example.com');
    cy.get('input[type="password"]').type('rootroot');
    cy.get('button[type="submit"]').click();
    cy.url().should('include', '/users');
    cy.get('tr').not(':contains("user@example.com"), :contains("admin@example.com")').then($rows => {
        const randomIndex = Math.floor(Math.random() * $rows.length);
        const randomUserRow = $rows[randomIndex];
        cy.wrap(randomUserRow).contains('a', 'Show').click();
    });
});
