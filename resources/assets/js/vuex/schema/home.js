import { schema } from 'normalizr';

export const competitor = new schema.Entity('competitors');

export const region = new schema.Entity('regions', {
    competitors: [ competitor ]
});
