import { renderHook } from "@testing-library/react-hooks";
import {setupServer} from "msw/node";
import {rest} from "msw";
import {mockedProducts} from "../../mocks/mocks";
import {endpoint} from "../../App";
import useHome from "../../hooks/useHome";

const server = setupServer(
    rest.get(`${endpoint}/products`, (req, res, ctx) => {
        return res(ctx.json(mockedProducts))
    }),
)

beforeAll(() => server.listen());
afterEach(() => server.resetHandlers());
afterAll(() => server.close());

test("getProducts", async () => {
    const { result } = renderHook(() => useHome());
    let loadingResult = await result.current.loadProducts();
    expect(loadingResult).toEqual(true);
});
