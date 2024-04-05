describe('User deletes task', () => {
    it('User deletes a task', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('own');
        cy.contains('button', 'Filter').click();
        cy.get('.fc-event-title').then($tasks => {
            const randomIndex = Math.floor(Math.random() * $tasks.length);
            const randomTask = $tasks[randomIndex];
            cy.wrap(randomTask).click();
        });

        // because Cypress doesn't handle JavaScript alerts and confirmation dialogs, the test is written like this to make it look like I clicked Ok
        cy.on('window:confirm', () => true);
        cy.contains('button', 'Delete').click();
    })
    it('User deletes a task but canceled it', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('own');
        cy.contains('button', 'Filter').click();
        cy.get('.fc-event-title').then($tasks => {
            const randomIndex = Math.floor(Math.random() * $tasks.length);
            const randomTask = $tasks[randomIndex];
            cy.wrap(randomTask).click();
        });

        // because Cypress doesn't handle JavaScript alerts and confirmation dialogs, the test is written like this to make it look like I clicked Cancel
        cy.on('window:confirm', () => false);
        cy.contains('button', 'Delete').click();
        cy.contains('button', 'Close').click();
    })
    it('User tries to delete a task from a other user', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('input[type="email"]').type('user@example.com');
        cy.get('input[type="password"]').type('rootroot');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/tasks');
        cy.get('select[name="filter"]').select('all');
        cy.contains('button', 'Filter').click();
        cy.get('.fc-event-title').then($tasks => {
            const tasksOfOtherUsers = $tasks.filter((index, task) => {
                return !Cypress.$(task).text().includes('user@example.com');
            });
            const randomIndex = Math.floor(Math.random() * tasksOfOtherUsers.length);
            const randomTask = tasksOfOtherUsers[randomIndex];
            cy.wrap(randomTask).click();

            // because Cypress doesn't handle JavaScript alerts and confirmation dialogs, the test is written like this to make it look like I clicked Cancel
            cy.on('window:confirm', () => true);
            cy.contains('button', 'Delete').click();
            cy.contains('button', 'Close').click();
        })
    })
})
